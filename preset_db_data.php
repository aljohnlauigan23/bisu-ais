<?php

require_once 'config.php';
require_once 'helper.php';

# Alumni
$file = 'data/courses.csv';
require_once 'controllers/alumni.php';
$c = new Alumni;
$c->importCoursesFromCSV($file);


?>