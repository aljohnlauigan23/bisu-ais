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
        'Department',
    );

    public $batches_tbl = array(
        'Course_Key',
        'Batch',
    );

    public function __construct() 
    {
        Parent::__construct();

    }

    public function addCourse($courses)
    {
        $table = 'courses';
        $data = array();
        foreach ($courses as $values) {
            $row = array();
            foreach ($this->courses_tbl as $col) {
                $row[] = isset($values[$col]) ? $values[$col] : '';
            }
            $data[] = $row;
        }
        $res = $this->insertTableRow($table, $this->courses_tbl, $data);

        return $res;
    }

    public function getCourses()
    {
        $sql = "
            SELECT * 
            FROM courses
            ORDER BY Department, Course_Code
        ";
        $data = $this->getDataFromTable($sql);
        $courses = array();
        foreach ($data as $row) {
            $courses[$row['Department']][$row['Course_Code']] = $row['Course_Name'];
        }

        return $courses;
    }

    public function getCoursesTableData()
    {
        $table = array();
        $table['table_title'] = 'Courses Available';
        $table['table_headers'] = array();
        $table['table_headers'][] = 'Department';
        $table['table_headers'][] = 'Course Code';
        $table['table_headers'][] = 'Course Name';
        $table['table_data'] = array();
        $courses = $this->getCourses();
        foreach ($courses as $dept => $courses) {
            foreach ($courses as $code => $course) {
                $table['table_data'][] = array(
                    $dept,
                    $code,
                    $course
                );
            }
        }

        return $table;
    }

    public function getCourseKey($course_code)
    {
        $sql = "
            SELECT * 
            FROM courses
            WHERE Course_Code = '{$course_code}'
            LIMIT 1
        ";
        $data = $this->getDataFromTable($sql);
        $key = 0;
        foreach ($data as $row) {
            $key = $row['Course_Key'];
        }

        return $key;
    }

    public function getCourseData($course_code)
    {
        $sql = "
            SELECT * 
            FROM courses
            WHERE Course_Code = '{$course_code}'
            LIMIT 1
        ";
        $results = $this->getDataFromTable($sql);
        $data = array();
        foreach ($results as $row) {
            $data = $row;
        }

        return $data;
    }

    public function addBatch($course_key, $batch)
    {
        $table = 'batches';
        $data = array();
        $data[] = array(
            'Course_Key' => $course_key,
            'Batch' => $batch
        );
        $res = $this->insertTableRow($table, $this->batches_tbl, $data);

        return $res;
    }

    public function getBatchKey($course_key, $batch)
    {
        $sql = "
            SELECT * 
            FROM batches
            WHERE Course_Key = $course_key
                AND Batch = '{$batch}'
            LIMIT 1
        ";
        
        $data = $this->getDataFromTable($sql);
        $key = 0;
        foreach ($data as $row) {
            $key = $row['Batch_Key'];
        }

        return $key;
    }

    public function getBatches()
    {
        $sql = "
            SELECT * 
            FROM batches as b
            LEFT JOIN courses as c ON b.Course_Key = c.Course_Key
            ORDER BY Batch DESC
        ";
        $data = $this->getDataFromTable($sql);
        $list = array();
        foreach ($data as $row) {
            $list[$row['Batch']] = array(
                'Course_Code' => $row['Course_Code'],
                'Department' => $row['Department'],
            );
        }

        return $list;
    }

    public function getUserKey($email)
    {
        $sql = "
            SELECT * 
            FROM users
            WHERE Email = '{$email}'
            LIMIT 1
        ";
        $data = $this->getDataFromTable($sql);
        $key = 0;
        foreach ($data as $row) {
            $key = $row['User_Key'];
        }

        return $key;
    }

    public function addUser($alumni)
    {
        $table = 'users';
        # Has Password
        $alumni['Password'] = hashPassword($alumni['Password']);
        $data = array();
        $row = array();
        foreach ($this->users_tbl as $col) {
            $row[] = isset($alumni[$col]) ? $alumni[$col] : '';
        }
        $data[] = $row;
        $res = $this->insertTableRow($table, $this->users_tbl, $data);

        return $res;
    }

    public function addAlumni($alumni)
    {
        $table = 'alumni';
        $data = array();
        $row = array();
        foreach ($this->alumni_tbl as $col) {
            $row[] = isset($alumni[$col]) ? $alumni[$col] : '';
        }
        $data[] = $row;
        $res = $this->insertTableRow($table, $this->alumni_tbl, $data);

        return $res;
    }

    public function addAlumniData($list)
    {
        foreach ($list as $alumni) {
            # Get alumni Course_Key, only add alumni if course is available
            $course_key = 0;
            if (!empty($alumni['Course'])) {
                $course_key = $this->getCourseKey($alumni['Course']);
            }
            if ($course_key < 1) {
                # Do not proceed if invalid course
                return false;
            }

            # Get alumni Batch_Key, do not proceed if batch is blank
            $batch_key = 0;
            if (!empty($alumni['Batch'])) {
                $batch_key = $this->getBatchKey($course_key, $alumni['Batch']);
                if ($batch_key < 1) {
                    $this->addBatch($course_key, $alumni['Batch']);
                    $batch_key = $this->getBatchKey($course_key, $alumni['Batch']);
                }
            }
            if ($batch_key < 1) {
                # Do not proceed if invalid batch
                return false;
            }
            $alumni['Batch_Key'] = $batch_key;
            //print "<pre>";
            //print_r($alumni);
            //exit;


            # Add alumni user, do not proceed if email and username are blank or when email already exists
            if (!empty($alumni['Email']) && !empty($alumni['User_Name'])) {
                $user_key = $this->getUserKey($alumni['Email']);
                if ($user_key > 0) {
                    # Do not proceed if existing user, email exists
                    return false;
                }
            } else {
                # Do not proceed if email and username are blank
                return false;
            }
            $user_key = 0;
            $this->addUser($alumni);
            $user_key = $this->getUserKey($alumni['Email']);
            
            if ($user_key < 1) {
                # Do not proceed alumni user is not successfully created
                return false;
            }
            $alumni['User_Key'] = $user_key;

            # Add alumni
            $this->addAlumni($alumni);
        }        
    }

    public function getBatchAlumniList($batch_key, $fields)
    {
        $list = array();
        $sql = "
            SELECT * 
            FROM alumni as a
            LEFT JOIN users as u on a.User_Key = u.User_Key
            WHERE Batch_Key = $batch_key
            ORDER BY Last_Name
        ";
        $results = $this->getDataFromTable($sql);
        foreach ($results as $i => $data) {
            $row = array();
            foreach ($fields as $col => $display) {
                $row[] = isset($data[$col]) ? $data[$col] : '';
            }
            $list[$i] = $row;
        }

        return $list;
    }

    public function getAlumniTableData()
    {
        $table = array();
        $course_key = $this->getCourseKey($_POST['course_sel']);
        if ($course_key > 0) {
            $batch_key = $this->getBatchKey($course_key, $_POST['batch_sel']);
            if ($batch_key > 0) {
                $fields = array(
                    'Last_Name' => 'Last Name',
                    'First_Name' => 'First Name',
                    'Gender' => 'Gender',
                    'Address' => 'Address',
                    'Position' => 'Position',
                    'Employment_Status' => 'Status',
                    'Company_Name' => 'Company',
                    'Company_Address' => 'Company Address',
                );
                $course_data = $this->getCourseData($_POST['course_sel']);
                $course = $course_data['Course_Code'];
                $table['table_title'] = 'Batch '.$_POST['batch_sel'];
                $table['table_info'] = $course_data['Course_Name'];;
                $table['table_headers'] = array_values($fields);
                $table['table_data'] = array();
                $table['table_data'] = $this->getBatchAlumniList($batch_key, $fields);
            }
        }

        return $table;   
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