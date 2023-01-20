<?php

    require_once 'views/header.php';
    require_once 'views/menu.php';

?>

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-3 img-twice position-relative h-100">
                    <div class="col-6">
                        <img class="img-fluid bg-light p-3" src="bisu-img/news/<?php echo $_POST['news']['News_Image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <p class="text-primary text-uppercase mb-2">NEWS</p>
                    <h1 class="display-6 mb-4"><?php echo $_POST['news']['News_Title'] ?></h1>
                    <p><?php echo $_POST['news']['News_Date'] ?></p>
                    <p class="text-primary"><?php echo ucwords(strtolower($_POST['news']['News_Author'])) ?></p>
                    <p><?php echo file_get_contents('./bisu-img/news/'.$_POST['news']['News_Desc']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
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
</center>

<?php

    require_once 'views/footer.php';

?>

