<?php


# Login
if (isset($_GET['menu']) && $_GET['menu'] == 'login') {
    require 'init.php';
    include_once 'models/db_connect.php';
    $sql = new DB_Connect; 
    
    if (isset($_POST['username']) && $_POST['username'] !== '' && isset($_POST['password']) && $_POST['password'] !== '') {
        $valid = $sql->isValidUser($_POST['username'], $_POST['password']);
        if (!$valid) {
            $_POST['danger'] = "Either user does not exist or username/password mismatched.";
            $_SESSION['logged'] = array();
        }
    } elseif (!empty($_POST)) {
        $_POST['danger'] = "Invalid Login.";
        $_SESSION['logged'] = array();
    }

    if (empty($_SESSION['logged'])) {
        require_once 'views/login.php';
        exit;
    }
}

# Logout
if (isset($_GET['logout']) && $_GET['logout'] == '1') {
    unset($_GET);
    unset($_POST);
    require_once 'views/login.php';
    exit;

# Guest Mode
} elseif (empty($_SESSION['logged'])) {
    require_once 'init.php';
} elseif (isset($_GET['menu']) && $_GET['menu'] == 'login') {
    $_GET['menu'] = 'home';
}

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

# Chat page
} else if(isset($_GET['menu']) && $_GET['menu'] == 'chat'){
    require 'views/ui_chat.php';

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