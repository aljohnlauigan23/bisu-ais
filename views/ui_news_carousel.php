
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                        <?php foreach ($_SESSION['news_list'] as $news) : ?>
                            <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                                <div class="position-relative">
                                    <img class="img-fluid" src="./bisu-img/news/<?php echo $news['News_Image']?>" alt="">
                                    <div class="service-overlay">
                                        <a class="btn btn-lg-square btn-outline-light rounded-circle" href="index.php?menu=news&nkey=<?php echo $news['News_Key'] ?>"><i class="fa fa-link text-primary"></i></a>
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h4><?php echo $news['News_Title'] ?></h4>
                                    <p> by <?php echo ucwords(strtolower($news['News_Author'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>





