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
                        <img class="img-fluid bg-light p-3" src="" alt="">
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <p class="text-primary text-uppercase mb-2">PROFILE</p>
                
                   
            
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

