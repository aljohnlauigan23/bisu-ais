<?php

require_once 'views/header.php';
require_once 'views/menu.php';

$html = '

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-3 img-twice position-relative h-100">
                    <div class="col-6">
                        <img class="img-fluid bg-light p-3" src="alumni/'.$news['news_pic'].'.jpg" alt="">
                    </div>
                    <div class="col-6 align-self-end">
                        <img class="img-fluid bg-light p-3" src="alumni/'.$news['news_pic'].'.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <p class="text-primary text-uppercase mb-2">NEWS</p>
                    <h1 class="display-6 mb-4">'.$news['title'].'</h1>
                    <p>'.$news['desc'].'</p>
                    <p>'.$news['date'].'</p>
                    <p>'.$news['poster'].'</p>
                    <a class="btn btn-primary py-3 px-5" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
';

print $html;

require_once 'views/footer.php';

?>

