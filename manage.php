<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';
require_once 'helper.php';
require 'init.php';

if (isset($_GET['menu']) && !empty($_GET['menu'])) {
    $menu = $_GET['menu'];
    $_POST['manage'] = 'manage';
    switch ($menu) {
        case 'courses':
            include_once 'models/sql_alumni.php';
            $sql = new SQL_Alumni;
            if (isset($_POST['add']) && $_POST['add'] == 'course') {
                if (isset($_POST['Course_Code']) && $_POST['Course_Code'] != '' && isset($_POST['Course_Name']) && $_POST['Course_Name'] != '') {
                    $course = array($_POST);
                    $sql->addCourse($course);
                } else {
                    $_POST['warning'] = 'Enter Course Code and Code Name';
                }
            }
            $_GET['table'] = $sql->getCoursesTableData();
            require_once 'views/ui_manage_courses.php';
            break;
        case 'alumni':
            include_once 'models/sql_alumni.php';
            $sql = new SQL_Alumni;
            if (isset($_POST['add']) && $_POST['add'] == 'alumni') {
                # Save Alumni
                if (isset($_FILES['upload_csv']) && !empty($_FILES['upload_csv']['tmp_name'])) {
                    $csv_file = $_FILES['upload_csv']['tmp_name'];
                    if (is_file($csv_file)) {
                        $list = getCSVFileData($csv_file, "\t");
                        //print "<pre>";
                        //print_r($list);
                        $created = $sql->addAlumniData($list);
                        $created_info = $created.'/'.count($list);
                        if ($created > 0) {
                            $_SESSION['batches'] = $sql->getBatches();
                            $_POST['success'] = 'Alumni data  ('.$created_info.') from "'.$_FILES['upload_csv']['name'].'" file has been successfully saved.';
                            # Get Course and Batch name from the first alumni to be used as default
                            if (isset($list[0]['Course']) && isset($list[0]['Batch'])) {
                                $_POST['course_sel'] = $list[0]['Course'];
                                $_POST['batch_sel'] = $list[0]['Batch'];
                            }
                        } else {
                            $_POST['warning'] = 'No alumni data ('.$created_info.') saved. Alumni may already exist.';
                        }
                    }
                } else {
                    $_POST['warning'] = 'No TSV file selected. Please click on [Browse...] button to select file.';
                }
            }
            # View Alumni
            if (isset($_POST['view']) && $_POST['view'] == 'alumni') {
                //print "<pre>";
                //print_r($_POST);
                $_POST['course_sel'] = $_POST['course'];
                $_POST['batch_sel'] = $_POST['batch'];
            } elseif (!isset($_POST['course_sel']) && !isset($_POST['batch_sel'])) {
                $batches = array_keys($_SESSION['batches']);
                if (!empty($batches)) {
                    $_POST['batch_sel'] = $batches[0];
                    $batch = $_SESSION['batches'][$_POST['batch_sel']];
                    $_POST['course_sel'] = $batch['Course_Code'];
                } else {
                    $_POST['batch_sel'] = '-';
                    $_POST['course_sel'] = '-';
                }
            }
            $table = $sql->getAlumniTableData();
            if (!empty($table)) {
                $_GET['table'] = $table;
            } elseif ($_POST['batch_sel'] != '-') {
                $_POST['warning'] = 'No alumni available for '.$_POST['course_sel'].' Batch '.$_POST['batch_sel'].'.';
            }

            require_once 'views/ui_manage_alumni.php';
            break;
        case 'events':
            include_once 'models/sql_events.php';
            $sql = new SQL_Events;
            if (isset($_POST['add']) && $_POST['add'] == 'event') {
                if (isset($_POST['Event_Title']) && $_POST['Event_Title'] != '' && 
                    isset($_POST['Event_Start']) && $_POST['Event_Start'] != '' &&
                    isset($_POST['Event_Location']) && $_POST['Event_Location'] != '' &&
                    isset($_POST['Event_Desc']) && $_POST['Event_Desc'] != '') {

                    //print "<pre>";
                    //print_r($_POST);
                    $event = array($_POST);
                    $sql->addEvent($event);
                    $_POST['success'] = 'The event has been successfully added.';
                    require 'init.php';
                } else {
                    print "<pre>";
                    print_r($_POST);
                    $_POST['danger'] = 'Fill in the required fields';
                }
            }
            require_once 'views/ui_manage_events.php';
            break;
        case 'news':
            include_once 'models/sql_news.php';
            $sql = new SQL_News;
            if (isset($_POST['add']) && $_POST['add'] == 'news') {
                if (isset($_POST['News_Title']) && $_POST['News_Title'] != '' && 
                    isset($_POST['News_Date']) && $_POST['News_Date'] != '' &&
                    isset($_POST['News_Desc']) && $_POST['News_Desc'] != '') {
                    if (isset($_FILES['news_image']) && !empty($_FILES['news_image']['tmp_name'])) {
                        $news_img = $_FILES['news_image']['tmp_name'];
                        if (is_file($news_img)) {
                            $news = $_POST;
                            $news['News_Image'] = $_FILES['news_image']['name'];
                            $dest_img = './bisu-img/news/'.$news['News_Image'];
                            copy($news_img, $dest_img);
                            if (is_file($dest_img)) {
                                $desc_file = './bisu-img/news/'.preg_replace('/\.([^\.]+)$/', '.html', $news['News_Image']);
                                file_put_contents($desc_file, $news['News_Desc']);
                                if (is_file($desc_file)) {
                                    $news['News_Desc'] = basename($desc_file);
                                    $news['User_Key'] = $_SESSION['logged']['User_Key'];
                                    $res = $sql->addNews(array($news));
                                    if ($res === true) {
                                        $_POST['success'] = 'The news has been successfully added.';
                                        require 'init.php';
                                    } else {
                                        $_POST['danger'] = 'An error is encountered when saving the news.';
                                    }
                                } else {
                                    $_POST['danger'] = 'An error is encountered when saving the news description.';
                                }
                            } else {
                                $_POST['danger'] = 'An error is encountered when uploading the news image.';
                            }
                        } else {
                            $_POST['danger'] = 'An error is encountered when uploading the news image.';
                        }
                    } else {
                        $_POST['danger'] = 'Select image for the news.';
                    }
                } else {
                    $_POST['danger'] = 'Fill in the required fields';
                }
            }
            //print "<pre>";
            //print_r($_SESSION['news_list']);
            require_once 'views/ui_manage_news.php';
            break;
        default:
            break;
    }
}

?>