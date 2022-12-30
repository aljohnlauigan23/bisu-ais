<?php

require_once 'init.php';

if (isset($_GET['menu']) && $_GET['menu'] == 'alumni') {
    include_once 'models/sql_alumni.php';
    $sql = new SQL_Alumni;
    $dept = 'ICT';
    $course = 'BSCS';
    $batch_key = 1;
    $data = $sql->getAlumniData($course, $batch_key);
    $_GET['course_sel'] = $_SESSION['courses'][$dept][$course];
    $_GET['batch_sel'] = '2020 - 2021';
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

?>