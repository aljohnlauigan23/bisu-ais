
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                        <?php foreach ($_SESSION['event_list'] as $events) : ?>
                            <div class="testimonial-item bg-white p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <img class="flex-shrink-0 rounded-circle border p-1" src="img/bisu_logo.png" alt="">
                                    <div class="ms-4">
                                        <h5 class="mb-1"><?php echo $events['Event_Title'] ?></h5>
                                        <span>
                                            <?php echo $events['Event_Location'] ?><br/>
                                            On <?php echo $events['Event_Start'] ?>
                                            <?php if (!empty($events['Event_End'])): ?>
                                            To <?php echo $events['Event_End'] ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <p class="mb-0"><?php echo $events['Event_Desc']?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
