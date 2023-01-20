<?php
    require_once 'views/header.php';
    require_once 'views/menu.php';
?>
    <script>
        //setTimeout(() => {
        //    document.location.reload();
        //}, 5000);
    </script>
    <!-- Chat Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2"><?php echo $_POST['course_sel']?> Chat Room</p>
                <h2 class="display-6 mb-5">Batch <?php echo $_POST['batch_sel']?></h2>
            </div>

            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <?php require_once 'views/ui_alert.php' ?>
                    
                    <form action="chat.php" method="POST">
                        <ul class="list-unstyled">
                            <?php foreach ($_SESSION['chat_room'] as $chat) : ?>
                                <li class="d-flex justify-content-between mb-4">
                                    <!--<img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                        class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60" 
                                    />-->
                                    <?php if ($chat['owner'] != 'You'): ?>
                                        <i style="padding-right:15px;"  class="bi bi-people-fill fa-3x"></i>
                                    <?php endif; ?>
                                    <div class="card w-100">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0"><?php echo $chat['owner'] ?></p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"> </i> <?php echo $chat['ago'] ?></p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                <?php echo $chat['msg'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php if ($chat['owner'] == 'You'): ?>
                                        <i style="padding-left:15px;"  class="bi bi-person-circle fa-3x"></i>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        
                            <li class="bg-white mb-3">
                                <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample2" rows="4" name="chat_msg"></textarea>
                                    <label class="form-label" for="textAreaExample2">Message</label>
                                </div>
                            </li>
                            <input type="hidden" name="send" value="Chat" />
                            <button class="btn btn-primary btn-rounded float-end py-3 px-5" type="submit"> Send</button>

                        </ul>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Chat End -->

<?php
    require_once 'views/footer.php';
?>
