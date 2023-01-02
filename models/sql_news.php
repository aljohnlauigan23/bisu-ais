<?php

require_once 'models/db_connect.php';

class SQL_News extends DB_Connect {

    public $news_tbl = array(
        'User_Key',
        'News_Title',
        'News_Date',
        'News_Desc',
        'News_Image',
    );

    public function __construct() 
    {
        Parent::__construct();
    }

    public function addNews($news)
    {
        $table = 'news';
        $data = array();
        foreach ($news as $values) {
            $row = array();
            foreach ($this->news_tbl as $col) {
                $row[] = isset($values[$col]) ? $values[$col] : '';
            }
            $data[] = $row;
        }
        $res = $this->insertTableRow($table, $this->news_tbl, $data);

        return $res;
    }

    public function getNewsList()
    {
        $sql = "
            SELECT 
                n.*,
                if (n.User_Key > 0, concat(First_Name, ' ', Last_Name), 'Admin') as News_Author
            FROM news as n
            LEFT JOIN users as u ON n.User_Key = u.User_Key
            ORDER BY News_Date, News_Title
        ";
        $list = $this->getDataFromTable($sql);

        return $list;
    }    
}