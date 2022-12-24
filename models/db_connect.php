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
            $values = "VALUES (".implode(',', $row).")";
        }
        $sql = "INSERT INTO {$table} (".implode(',', $fields).") ".implode(', ', $values);

        if ($this->db->query($sql) === true) {
            $success = true;
        } else {
            $success = $this->db->error;
        }

        return $success;
    }

}

?>