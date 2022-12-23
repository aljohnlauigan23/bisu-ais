<?php

    require_once 'views/header.php';
    require_once 'views/menu_alumni.php';

    $html = '
    <div class="container-xxl px-0 py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h3 class="text-primary text-uppercase mb-2">Bachelor of Science in Computer Science</h3>
            <h1 class="display-6 mb-0">Batch 2020 - 2021</h1>
        </div>
        <div class="row g-0">
    ';

    $cnt = 0;
    foreach ($_GET['alumni'] as $alumni) {
        $cnt++;
        $reverse = ($cnt == 3 || $cnt == 4) ? '-reverse' : '';
        if ($cnt > 3) {
            $cnt = 0;
        }
        $html .= '
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 flex-sm-row'.$reverse.'">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="alumni/'.$alumni['profile_pic'].'.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4></h4>
                                <span>'.$alumni['info'].'</span>
                            </div>
                            <p>'.$alumni['desc'].'</p>
                            <div class="d-flex">
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" disabled href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        ';
    }    

    $html .= '
        </div>
    </div>
    ';

    print $html;

    require_once 'views/footer.php';

?>

