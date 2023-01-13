<?php

require_once 'views/header.php';
require_once 'views/menu.php';

$html = '
<!-- Profile Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-3 img-twice position-relative h-100">
                    <div class="col-6">
                        <img class="img-fluid bg-light p-3" src="img/about-1.jpg" alt="">
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <p class="text-primary text-uppercase mb-2">Profile</p>
                    <h1 class="display-6 mb-4">Name of User</h1>
                    <p>Address</p>
                    <p>Employment Status</p>
                    <p>Position</p>
                    <p>Company Name</p>
                    <p>Company Adress</p>
                    <p>E-mail</p>
                                      
                    <a class="btn btn-primary py-3 px-5" href="">Edit</a>                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile End -->
';

print $html;

require_once 'views/footer.php';

?>