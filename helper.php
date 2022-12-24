<?php

function hashPassword($pwd)
{
    $hashed = md5('bisu-bc-ais_'.$pwd);

    return $hashed;
}

function getCSVFileData($file) 
{
    $data = array();
    if (is_file($file)) {
        $fd = fopen($file, "r");
        if ($fd == null) {
            die("Command 'fopen' failed for $file.");
        }
        $line = trim(fgets($fd));
        $headers = explode(',', $line);
        while (!feof($fd)) {
            $line = trim(fgets($fd));
            $token = explode(',', $line);
            $row = array();
            foreach ($headers as $i => $header) {
                $row[$header] = $token[$i];
            }
            $data[] = $row;
        }
        fclose($fd);
    }

    return $data;
}

/*
function displayAlumni() {
    include_once 'models/sql_alumni.php';
    $sql = new SQL_Alumni;
    $course = 'bsit';
    $batch = 2021;
    $data = $sql->getAlumniData($course, $batch);
    $_GET['alumni'] = $data;
    require_once 'views/ui_alumni.php';
    $_GET[''] = array(); 
}

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
*/

?>