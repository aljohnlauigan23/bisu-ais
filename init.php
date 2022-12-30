<?php

$_SESSION['news_list'] = array(
    '1' => 'Hudyaka sa Pasko',
    '2' => 'Foundation Day',
    '3' => 'End VAW',
    '4' => 'Civil Service Month',
);
//$_SESSION['news_list'] = array();

include_once 'models/sql_alumni.php';
$sql = new SQL_Alumni;
$_SESSION['courses'] = $sql->getCourses();
$_SESSION['departments'] = array();
foreach ($_SESSION['courses'] as $dept => $courses) {
    $desc = defined($dept) ? constant($dept): ucfisrt($dept).' Department';
    $_SESSION['departments'][$dept] = $desc;
}
$_SESSION['batches'] = $sql->getBatches();

include_once 'models/sql_events.php';
$sql = new SQL_Events;
$_SESSION['event_list'] =  $sql->getEventList();


include_once 'models/sql_news.php';
$sql = new SQL_News;
$_SESSION['news'] = $sql->getNewsData();

include_once 'models/sql_gallery.php';
$sql = new SQL_Gallery;
$_SESSION['gallery'] = $sql->getGalleryData();


?>