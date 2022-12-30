<?php

    require_once 'views/header.php';
    require_once 'views/menu.php';

    $html = '
        <div class="container-fluid hero-header bg-light py-5 mb-5" style="background-image: url(img/home_background.jpg); background-style: cover;">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <p class="text-primary text-uppercase mb-2 animated slideInDown">WELCOME</p>
                        <h1 class="display-4 mb-3 animated slideInDown text-primary">BISU BALILIHAN CAMPUS </h1>
                        <h3  class=" animated slideInDown text-primary">ALUMNI INFORMATION SYSTEM</h3>
                        <p class="animated slideInDown text-light">Nobody is bothered about an institution more than its alumni </p>
                        <div class="d-flex align-items-center pt-4 animated slideInDown">
                           
                        </div>
                    </div>
                    <div class="col-lg-6 animated fadeIn">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid p-1 w-100 mb-3" src="img/bisu_logo.png" alt="">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
            
        <div class="container-xxl bg-light py-5 my-5" style="margin:0;">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h3 class="text-primary text-uppercase mb-2">News/Activities</h3>
                    
                </div>
                <div class="row g-3">
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                ';

                
                    foreach ($_SESSION['news'] as $news) {
                        $html .=  '
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                                <div class="position-relative">
                                    <img class="img-fluid" src="alumni/'.$news['news_pic'].'.jpg" alt="">
                                    <div class="service-overlay">
                                        <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-link text-primary"></i></a>
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h4>'.$news['title'].'</h4>
                                </div>
                            </div>
                        </div>';
                    }

    $html .= '
                    </div>
                </div>
            </div>
        </div>
        <!-- News End -->

        <!-- Gallery -->
        <div class="container-xxl py-5" >
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h3 class="text-primary text-uppercase mb-2">Gallery</h3>
            
                </div>
                <div class="row g-3">';
                foreach ($_SESSION['gallery'] as $gallery) {
                    $html .=  '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid"  src="alumni/'.$gallery['news_pic'].'.jpg" alt="">
                                <a class="project-title h5 mb-0" href="alumni/'.$gallery['news_pic'].'.jpg" data-lightbox="project">
                            '.$gallery['album_title'].'
                                </a>
                            </div>
                        </div>
                    
                    </div>
                </div>';
                }  
                $html .= '</div>
            </div>
        </div>

        <!-- Gallery end -->
    ';

    print $html;

?>


<!-- Events Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h3 class="text-primary text-uppercase mb-2">Upcoming Events</h3>
            
        </div>
        
        <?php
            require_once 'views/ui_events_carousel.php';
        ?>  
    </div>
</div>

<?php    
    require_once 'views/footer.php';
?>

