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



if (!isset($_GET['department'])) {
    $_GET['department'] = 'all';
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
    } elseif (!empty($_SESSION['logged']) && $_SESSION['logged'] != 'guest') {
        $valid = true;
    } else {
        unset($_SESSION['logged']);
        require_once 'views/login.php';
        exit;
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

require 'init.php';

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
            $_POST['department'] = current(array_keys($_SESSION['departments']));
        }

        # Course clicked via Menu
        if (isset($_GET['course']) && $_GET['course'] != '') {
            $_POST['course_sel'] = $_GET['course'];
        } 
    }

    $data = array();
    if (isset($_POST['course_sel'])) {
        $_POST['course_data'] = $sql->getCourseData($_POST['course_sel']);
        $data = $sql->getAlumniData();
    }

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
    $_POST['news'] = $sql->getNewsData($_GET['nkey']);
    require_once 'views/ui_news.php';

# Association page    
} else if(isset($_GET['menu']) && $_GET['menu'] == 'association') {
    //include_once 'models/sql_news.php';
    //$sql = new SQL_News;
    //$_POST['news'] = $sql->getNewsData($_GET['nkey']);
    require_once 'views/ui_association.php';

# Profile page    
} else if(isset($_GET['menu']) && $_GET['menu'] == 'profile') {
    include_once 'models/sql_alumni.php';
    $sql = new SQL_Alumni;

    
    $_POST['profile_fields'] = array(
        'Batch' => false,
        'Course_Name' => false,
        'Email' => true,
        'Address' => true,
        'Position' => true,
        'Employment_Status' => true,
        'Company_Name' => true,
        'Company_Address' => true,
    );
    //print "<pre>"; print_r($_GET); print_r($_POST); exit;

    if (isset($_POST['save']) && $_POST['save'] == 'profile') {
        $updated = $sql->updateAlumniProfile($_POST, $_GET['ukey']);
        if (!$updated) {
            $_POST['danger'] = 'Something went wrong upon saving user profile.';
        } else {
            header('Location: index.php?menu=profile&ukey='.$_GET['ukey']);
        }
    }

    if (intval($_GET['ukey']) > 0) {
        $_POST['profile'] = $sql->getUserProfileData($_GET['ukey']);
    } else {
        $_POST['profile'] = $sql->getAdminProfile();
    }

    require_once 'views/ui_profile.php';

# Gallery page
} else if(isset($_GET['menu']) && $_GET['menu'] == 'gallery') {    
    include_once 'models/sql_gallery.php';
    $sql = new SQL_Gallery;
    $_POST['gallery'] = $sql->getGalleryData();
    require_once 'views/ui_gallery.php';

# Home page
} else {    
    require_once 'views/ui_home.php';
}

?>