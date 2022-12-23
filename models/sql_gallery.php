<?php

class SQL_Gallery {

    function __construct() {

    }
    public function getGalleryData() {
        $data = array(
            array(
                'news_pic' => 'img1',
                'album_title' => 'A'
               
            ),array(
                'news_pic' => 'img2',
                'album_title' => 'B'
    
            ),array(
                'news_pic' => 'img3',
                'album_title' => 'C'
    
            ),array(
                'news_pic' => 'img4',
                'album_title' => 'D'
    
            )
        );
        return $data;
    }
}

?>