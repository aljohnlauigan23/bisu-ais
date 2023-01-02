<?php
    require_once 'views/header.php';
    require_once 'views/menu.php';
?>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <?php require_once 'views/ui_alert.php' ?>

            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Manage</p>
                <h1 class="display-6 mb-5">NEWS</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="manage.php?menu=news" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="news_title" name="News_Title" placeholder="News Title">
                                    <label for="news_title">*Title</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="news_date" name="News_Date" placeholder="Date">
                                    <label for="news_date">*Date</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" name="news_image" accept="img/png img/jpg img/jpeg" class="form-control form-control-lg" id="news_image" />
                                    <label for="news_image">*Image</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description" id="news_desc" name="News_Desc" style="height: 200px"></textarea>
                                    <label for="news_desc">*Description</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="hidden" name="add" value="news" />
                                <button class="btn btn-primary py-3 px-5" type="submit">Add News</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; padding-top: 50px;">
                <h3 class="display-6 mb-0">NEWS / ACTIVITIES</h3>
            </div>
            <?php
                require_once 'views/ui_news_carousel.php';
            ?>  
        </div>
    </div>
    <!-- Contact End -->

<?php
    require_once 'views/footer.php';
?>
