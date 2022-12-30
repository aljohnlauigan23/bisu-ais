<?php

require 'init.php';

if (isset($_GET['menu']) && !empty($_GET['menu'])) {
    $menu = $_GET['menu'];
    switch ($menu) {
        case 'courses':
            include_once 'models/sql_alumni.php';
            $sql = new SQL_Alumni;
            if (isset($_POST['add']) && $_POST['add'] == 'course') {
                if (isset($_POST['Course_Code']) && $_POST['Course_Code'] != '' && isset($_POST['Course_Name']) && $_POST['Course_Name'] != '') {
                    $course = array($_POST);
                    $sql->addCourse($course);
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
                        $sql->addAlumniData($list);
                        $_SESSION['batches'] = $sql->getBatches();
                        $_POST['success'] = 'Alumni data from "'.$_FILES['upload_csv']['name'].'" file has been successfully saved.';
                        # Get Course and Batch name from the first alumni to be used as default
                        if (isset($list[0]['Course']) && isset($list[0]['Batch'])) {
                            $_POST['course_sel'] = $list[0]['Course'];
                            $_POST['batch_sel'] = $list[0]['Batch'];
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
            require_once 'views/ui_manage_events.php';
            break;
        case 'news':
            require_once 'views/ui_manage_news.php';
            break;
        default:
            break;
    }
}

?>