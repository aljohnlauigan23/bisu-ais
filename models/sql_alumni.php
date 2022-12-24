<?php

require_once 'models/db_connect.php';

class SQL_Alumni extends DB_Connect {

    public $users_tbl = array(
        'User_Name',
        'Password',
        'Email',
        'User_Type',
        'First_Name',
        'Middle_Name',
        'Last_Name',
        'Birth_Date',
        'Gender',
    );

    public $alumni_tbl = array(
        'User_Name',
        'Batch_Key',
        'User_Key',
        'Address',
        'Employment_Status',
        'Position',
        'Company_Name',
        'Company_Address',
    );

    public $courses_tbl = array(
        'Course_Code',
        'Course_Name',
    );

    public $batches_tbl = array(
        'Course_Key',
        'Batch',
    );

    public function __construct() 
    {
        Parent::__construct();

    }

    public function addCourse($course)
    {
        $table = 'courses';
        $data = array();
        foreach ($course as $values) {
            $row = array();
            foreach ($this->courses_tbl as $col) {
                $row[] = isset($values[$col]) ? $values[$col] : '';
            }
            $data[] = $row;
        }
        $res = $this->insertTableRow($table, $this->courses_tbl, $data);

        return $res;
    }

    public function addAlumni($alumni)
    {

    }

    public function addUser($alumni)
    {
        $table = 'users';
        $this->insertTableRow($table, $fields, $data);

    }

    public function getAlumniData($course, $batch) 
    {
        $alumni = array(
            'profile_pic' => 'pic1',
            'info' => 'info',
            'desc' => 'This is a description',
            'fb' => 'www.facebook.com/',
            'twitter' => '',
            'insta' => '',
        );

        $data = array();
        for ($i=1; $i<20; $i++) {
            $data[] = $alumni;
        }

        return $data;
    }

    public function getBatchesPerCourse() 
    {
        $data = array();

        return $data;
    }

}


?>