<?php

session_start();

require_once 'config.php';
require_once 'helper.php';


$_SESSION['logged'] = array(
    'User_Key' => 1,
    'User_Type' => 'admin',
    'First_Name' => 'Admin',
);
//$_SESSION['logged'] = array();

$_SESSION['news_list'] = array(
    '1' => 'Hudyaka sa Pasko',
    '2' => 'Foundation Day',
    '3' => 'End VAW',
    '4' => 'Civil Service Month',
);
//$_SESSION['news_list'] = array();

if (isset($_GET['menu']) && $_GET['menu'] == 'alumni') {
    include_once 'models/sql_alumni.php';
    $sql = new SQL_Alumni;
    $course = 'bsit';
    $batch = 2021;
    $data = $sql->getAlumniData($course, $batch);
    $_GET['alumni'] = $data;
    require_once 'views/ui_alumni.php';
    $_GET[''] = array();   
} else if(isset($_GET['menu']) && $_GET['menu'] == 'news'){
    include_once 'models/sql_news.php';
    $sql = new SQL_News;
    $data = $sql->getNewsData();
    $_GET['news'] = $data;
    require_once 'views/ui_home.php';
    $_GET['news'] = array();

} else if(isset($_GET['menu']) && $_GET['menu'] == 'gallery'){
    include_once 'models/sql_gallery.php';
    $sql = new SQL_Gallery;
    $data = $sql->getGalleryData();
    $_GET['gallery'] = $data;
    require_once 'views/ui_home.php';
    $_GET['gallery'] = array();
    
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

$conn->close();

?>