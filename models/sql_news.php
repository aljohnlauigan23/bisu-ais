<?php

class SQL_News {

    function __construct(){

    }

    public function getNewsData() {
        $data = array(
            array(
                'news_pic' => 'img6',
                'title' => 'HUDYAKA 2022',
                'desc' => '‘𝑻𝒊𝒔 𝒕𝒉𝒆 𝒔𝒆𝒂𝒔𝒐𝒏 𝒕𝒐 𝒃𝒆 𝒋𝒐𝒍𝒍𝒚, 𝑩𝑰𝑺𝑼𝒂𝒏𝒔! ❄️🦌
                Its the most wonderful time of the year again and we are now feeling the cold Christmas breeze. 🥶 Before we end this fruitful year, let us celebrate together our success and achievements.
                Join us as we celebrate the long-awaited Christmas party ug mag 𝑯𝑼𝑫𝒀𝑨𝑲𝑨 kitang tanan as we all once again recapture the spirit of Christmas.
                Well see you there, BISUans! ☃️',
                'date' => 'November-22-2022',
                'poster' => 'Eric Maglajos'
            ),array(
                'news_pic' => 'img7',
                'title' => 'info1',
                'desc' => 'This is a description',
                'date' => 'November-22-2022',
                'poster' => 'Eric Maglajos'
            ),
            array(
                'news_pic' => 'img8',
                'title' => 'info2',
                'desc' => 'This is a description',
                'date' => 'November-22-2022',
                'poster' => 'Eric Maglajos'
            ),
            array(
                'news_pic' => 'img2',
                'title' => 'info3',
                'desc' => 'This is a description',
                'date' => 'November-22-2022',
                'poster' => 'Eric Maglajos'
            ),array(
                'news_pic' => 'img10',
                'title' => 'info4',
                'desc' => 'This is a description',
                'date' => 'November-22-2022',
                'poster' => 'Eric Maglajos'
            )
        );

        return $data;
    }
}

?>