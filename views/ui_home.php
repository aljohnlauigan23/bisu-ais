<?php
    require_once 'views/header.php';
    require_once 'views/menu.php';
?>
    <div style="margin:0;padding:0;width:100%;height:2vw;background:orange;"></div>
        <div class="container-fluid hero-header bg-light py-5 mb-5" style="background-image: url(bisu-img/aa.jpg); background-repeat: no-repeat; background-size: cover;">
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

<center>
        <!-- News -->
        <div class="container-xxl bg-light py-5 my-5" style="margin:0;">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; padding-top: 50px;">
                <h3 class="display-6 mb-0">NEWS / ACTIVITIES</h3>
            </div>
            <?php
                require_once 'views/ui_news_carousel.php';
            ?>  
        </div>
        <!-- News end -->

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

</center>

<?php    
    require_once 'views/footer.php';
?>

