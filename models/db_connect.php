<?php

class DB_Connect {

    public function __construct()
    {
        // Create connection
        $this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function insertTableRow($table, $fields, $data)
    {
        $values = array();
        foreach ($data as $row) {
            foreach ($row as $i => $val) {
                if (!is_numeric($val)) {
                    $row[$i] = "'$val'";
                }
            }
            $values[] = "VALUES (".implode(',', $row).")";
        }

        if (!empty($values)) {
            # Only insert table data when has values
            $sql = "INSERT INTO {$table} (".implode(',', $fields).") ".implode(', ', $values);
            if ($this->db->query($sql) === true) {
                $success = true;
            } else {
                $success = $this->db->error;
            }
        }

        return $success;
    }

    public function getDataFromTable($sql)
    {
        $data = array();
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function isValidUser($username, $password)
    {
        $valid = false;
        if (strtolower($username) == 'admin') {
            if ($password === ADMIN_PASS) {
                $valid = true;
                $_SESSION['logged'] = array(
                    'User_Key' => 1,
                    'User_Type' => 'admin',
                    'First_Name' => 'Admin',
                );
            }
        } else {
            $sql = "
                SELECT * 
                FROM users 
                WHERE Password = '".hashPassword($password)."'
                    AND User_Name = '".$username."'
                ";
            $user = $this->getDataFromTable($sql);
            if (!empty($user)) {
                $valid = true;
                $_SESSION['logged'] = current($user);
            }
        } 

        return $valid;
    }

}

?>