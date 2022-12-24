<?php

class Alumni {

    public function __construct()
    {
        require_once 'models/sql_alumni.php';
        $this->sql = new SQL_Alumni;
        $this->index();
    }

    public function index()
    {

    }

    public function importCoursesFromCSV($csv_file)
    {
        if (is_file($csv_file)) {
            $data = getCSVFileData($csv_file);
            foreach ($data as $row) {
                $this->sql->addCourse($row);
            }
        }
    }

}

?>
