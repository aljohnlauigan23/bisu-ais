<?php

class SQL_Alumni {

    function __construct() {

    }

    public function getAlumniData($course, $batch) {
        $data = array(
            array(
                'profile_pic' => 'pic1',
                'info' => 'info',
                'desc' => 'This is a description',
                'fb' => 'www.facebook.com/',
                'twitter' => '',
                'insta' => '',
            ),
            array(
                'profile_pic' => 'pic2',
                'info' => 'info2',
                'desc' => 'This is a description2',
                'fb' => 'www.facebook.com/',
                'twitter' => '',
                'insta' => '',
            ),
            array(
                'profile_pic' => 'pic3',
                'info' => 'info3',
                'desc' => 'This is a description3',
                'fb' => 'www.facebook.com/',
                'twitter' => '',
                'insta' => '',
            ),
            array(
                'profile_pic' => 'pic4',
                'info' => 'info2',
                'desc' => 'This is a description2',
                'fb' => 'www.facebook.com/',
                'twitter' => '',
                'insta' => '',
            ),
            array(
                'profile_pic' => 'pic5',
                'info' => 'info3',
                'desc' => 'This is a description3',
                'fb' => 'www.facebook.com/',
                'twitter' => '',
                'insta' => '',
            ),
        );

        return $data;
    }
}


?>