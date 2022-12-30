<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';
require_once 'helper.php';

function logout()
{
    unset($_SESSION['logged']);
    require_once 'views/login.php';
    exit;

}

# Login
if (isset($_GET['menu']) && $_GET['menu'] == 'login') {
    $valid = false;
    if (isset($_POST['login']) && $_POST['login'] == 'submit') {
        $valid = false;
        if (isset($_POST['username']) && $_POST['username'] !== '' && isset($_POST['password']) && $_POST['password'] !== '') {
            $_SESSION['logged'] = array();
            include_once 'models/db_connect.php';
            $sql = new DB_Connect; 
            $valid = $sql->isValidUser($_POST['username'], $_POST['password']);
            if (!$valid) {
                $_POST['danger'] = "Either user does not exist or username/password mismatched.";
            } else {
                $_SESSION['logged'] = $_POST['logged'];
                require 'init.php';
            }
        } else {
            $_POST['danger'] = "Invalid Login.";
        }
    } elseif (!empty($_SESSION['logged'])) {
        $valid = true;
    }

    if (!$valid) {
        logout();
    }
}

# Logout
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    logout();

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
} else if(isset($_GET['menu']) && $_GET['menu'] == 'news') {
    include_once 'models/sql_news.php';
    $sql = new SQL_News;
    $data = $sql->getNewsData();
    $_GET['news'] = $data;
    require_once 'views/ui_home.php';
    $_GET['news'] = array();

# Gallery page
} else if(isset($_GET['menu']) && $_GET['menu'] == 'gallery') {
    include_once 'models/sql_gallery.php';
    $sql = new SQL_Gallery;
    $data = $sql->getGalleryData();
    $_GET['gallery'] = $data;
    require_once 'views/ui_home.php';
    $_GET['gallery'] = array();

# Chat page
} else if(isset($_GET['menu']) && $_GET['menu'] == 'chat') {
    include_once 'models/sql_alumni.php';
    $sql = new SQL_Alumni;
    $user_key = $_SESSION['logged']['User_Key'];
    $_SESSION['logged_profile'] = $sql->getUserProfile($user_key);
    $_POST['batch_sel'] = $_SESSION['logged_profile']['Batch'];
    $_POST['course_sel'] = $_SESSION['logged_profile']['Course_Name'];
    $_POST['department_sel'] = $_SESSION['logged_profile']['Department'];

    $_SESSION['chat_room'] = array();
    $_SESSION['chat_room'][] = array(
        'owner' => 'Bradd Pitt',
        'ago' => '3 days ago',
        'msg' => 'We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.',
    );
    $_SESSION['chat_room'][] = array(
        'owner' => 'Angelina Jolie',
        'ago' => '1 day ago',
        'msg' => 'dhdshdfhdshThis is a very chat message. Sameplereyredfshsdhsdh onylsdaf .dsgajlprewgasga.sg.asgawtgaga!',
    );
    $_SESSION['chat_room'][] = array(
        'owner' => 'You',
        'ago' => '11 hrs ago',
        'msg' => 'uiyfkfgkfmtfnrsbehrThis is a very chat message. Sameple onyl! We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.',
    );
    $_SESSION['chat_room'][] = array(
        'owner' => 'You',
        'ago' => '30 mins ago',
        'msg' => 'WQEQWTDcbvv br ytujnsrgEvbsdFHRGnjfgbh bsdfbsvv sThis is a very chat message. Sameple onylsdaf .dsgajlprewgasga.sg.asgawtgaga!',
    );
    $_SESSION['chat_room'][] = array(
        'owner' => 'Messa',
        'ago' => '20 mins ago',
        'msg' => 'WQEQWTDcbvv br ytujnsrgEvbsdFHRGnjfgbh bsdfbsvv sThis is a very chat message. Sameple onylsdaf .dsgajlprewgasga.sg.asgawtgaga!',
    );
    $_SESSION['chat_room'][] = array(
        'owner' => 'You',
        'ago' => '18 mins ago',
        'msg' => 'Hi...',
    );
    $_SESSION['chat_room'][] = array(
        'owner' => 'Angelina Jolie',
        'ago' => '10 mins ago',
        'msg' => 'Hello, there!',
    );
    require 'views/ui_chat.php';

# Home page
} else {
    $_POST['home'] = 'home';
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