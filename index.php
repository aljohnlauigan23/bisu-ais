<?php

require_once 'init.php';

# Alumni page
if (isset($_GET['menu']) && $_GET['menu'] == 'alumni') {
    include_once 'models/sql_alumni.php';
    $sql = new SQL_Alumni;

    if (isset($_POST['course']) && $_POST['course'] != '' && isset($_POST['course']) && $_POST['course'] != '') {
            //print "<pre>";
            //print_r($_POST);
            $_POST['course_sel'] = $_POST['course'];
            $_POST['batch_sel'] = $_POST['batch'];
    } else {
        # Default Course / Batch
        $batches = array_keys($_SESSION['batches']);
        if (!empty($batches)) {
            $_POST['batch_sel'] = $batches[0];
            $batch = $_SESSION['batches'][$_POST['batch_sel']];
            $_POST['course_sel'] = $batch['Course_Code'];
        } else {
            $_POST['warning'] = 'No Alumni data available yet.';
        }

        # Course clicked via Menu
        if (isset($_GET['course']) && $_GET['course'] != '') {
            $_POST['course_sel'] = $_GET['course'];
        } 
    }

    $_POST['course_data'] = $sql->getCourseData($_POST['course_sel']);
    $data = $sql->getAlumniData();
    if (empty($data)) {
        $_POST['warning'] = 'No Alumni data available for the selected batch.';
    } else {
        $_POST['alumni'] = $data;
    }

    require_once 'views/ui_alumni.php';

# News page    
} else if(isset($_GET['menu']) && $_GET['menu'] == 'news'){
    include_once 'models/sql_news.php';
    $sql = new SQL_News;
    $data = $sql->getNewsData();
    $_GET['news'] = $data;
    require_once 'views/ui_home.php';
    $_GET['news'] = array();

# Gallery page
} else if(isset($_GET['menu']) && $_GET['menu'] == 'gallery'){
    include_once 'models/sql_gallery.php';
    $sql = new SQL_Gallery;
    $data = $sql->getGalleryData();
    $_GET['gallery'] = $data;
    require_once 'views/ui_home.php';
    $_GET['gallery'] = array();

# Home page
} else {
    include_once 'models/sql_news.php';
    $sql = new SQL_News;
    $data = $sql->getNewsData();
    $_GET['news'] = $data;

    include_once 'models/sql_gallery.php';
    $sql_gallery = new SQL_Gallery;
    $data_gallery= $sql_gallery->getGalleryData();
    $_GET['gallery'] = $data_gallery;
    
    require_once 'views/ui_home.php';
    $_GET['news'] = array();
    $_GET['gallery'] = array();
}

?>