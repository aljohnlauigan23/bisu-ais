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
            <div class="row g-3">';
            foreach ($_GET['news'] as $news) {
              $html .=  '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
        $html .= '</div>
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
            foreach ($_GET['gallery'] as $gallery) {
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

 $html .= '   
<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h3 class="text-primary text-uppercase mb-2">Upcoming Events</h3>
            
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-white p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-2.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-3.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Rhea</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
        </div>
    </div>
</div> ';

    $html .= '
    <!-- Page Footer starts -->
    <div class="container-fluid footer position-relative bg-primary text-white-50 mt-5 py-5 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row g-5 py-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="display-5 text-light">BISU-BC ALS</h1>
                </a>
                <p>Aliquyam sed elitr elitr erat sed diam ipsum eirmod eos lorem nonumy. Tempor sea ipsum diam  sed clita dolore eos dolores magna erat dolore sed stet justo et dolor.</p>
                <p><i class="fa fa-map-marker-alt me-2"></i>Magsija, Balilihan, Bohol</p>
                <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-2"></i>bisu_bc@als.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">

                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">VISION</h4>
                        <p>A premier Science and Technology university for the formation of world class and virtuous human resource for sustainable development in Bohol and the Country.</p>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">MISSION</h4>
                        <p>BISU is committed to provide quality higher education in the arts and sciences, as well as in the professional and technological fields; undertake research and development and extension services for the sustainable development of Bohol and the country.

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-dark text-white border-top border-secondary px-0">
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <div class="py-4 px-5 text-center text-md-start">
            <p class="mb-0">&copy; <a class="text-primary" href="#">BISU-BC ALS</a>. All Rights Reserved 2023.</p>
        </div>
        <div class="py-4 px-5 bg-secondary footer-shape position-relative text-center text-md-end">
            
        </div>
    </div>
</div>



    <!-- Page Footer ends-->
    ';


    print $html;

    
    require_once 'views/footer.php';


?>

