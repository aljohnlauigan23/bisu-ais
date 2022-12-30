<?php

require_once 'models/db_connect.php';

class SQL_Events extends DB_Connect {

    public $events_tbl = array(
        'Event_Title',
        'Event_Start',
        'Event_End',
        'Event_Location',
        'Event_Desc',
    );

    public function __construct() 
    {
        Parent::__construct();
    }

    public function addEvent($event)
    {
        $table = 'events';
        $data = array();
        foreach ($event as $values) {
            $row = array();
            foreach ($this->events_tbl as $col) {
                $row[] = isset($values[$col]) ? $values[$col] : '';
            }
            $data[] = $row;
        }
        $res = $this->insertTableRow($table, $this->events_tbl, $data);

        return $res;
    }

    public function getEventList()
    {
        $sql = "
            SELECT *
            FROM events
            ORDER BY Event_Start, Event_Title
        ";
        $list = $this->getDataFromTable($sql);

        return $list;
    }    
}