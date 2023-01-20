<?php

$_SESSION['departments'] = array();
$departments = array(
    'ICT',
    'ITD',
);
foreach ($departments as $dept) {
    $desc = defined($dept) ? constant($dept): ucfirst($dept).' Department';
    $_SESSION['departments'][$dept] = $desc;
}

include_once 'models/sql_alumni.php';
$sql = new SQL_Alumni;
$_SESSION['courses'] = $sql->getCourses();
$_SESSION['batches'] = $sql->getBatches();

include_once 'models/sql_events.php';
$sql = new SQL_Events;
$_SESSION['event_list'] =  $sql->getEventList();


include_once 'models/sql_news.php';
$sql = new SQL_News;
$_SESSION['news_list'] = $sql->getNewsList();



?>