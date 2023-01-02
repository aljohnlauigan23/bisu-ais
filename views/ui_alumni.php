<?php
    require_once 'views/header.php';
    require_once 'views/menu_alumni.php';
?>
    
        <!-- Profile Start -->
        <div class="container-xxl px-0 py-5">

            <?php require_once 'views/ui_alert.php' ?>

            <div class="row g-0 justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="index.php?menu=alumni" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control selectpicker"  id="course" name="course">
                                        <?php foreach ($_SESSION['courses'] as $dept => $courses) : ?>
                                            <?php foreach ($courses as $course_code => $course_name) : ?>
                                                <option value="<?php echo $course_code ?>" 
                                                    <?php if (isset($_POST['course_sel']) && $course_code == $_POST['course_sel']): ?>
                                                        selected="selected"
                                                    <?php endif; ?>
                                                ><?php echo $dept.': '.$course_name ?></option>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="course">Course</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select class="form-control selectpicker"  id="batch" name="batch">
                                        <?php foreach ($_SESSION['batches'] as $batch => $batch_data) : ?>
                                            <option value="<?php echo $batch ?>"
                                                <?php if ($batch == $_POST['batch_sel']): ?>
                                                    selected="selected"
                                                <?php endif; ?>
                                            ><?php echo $batch ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="batch">Batch</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-3 text-center">
                                    <input type="hidden" name="view" value="alumni" />
                                    <button class="btn btn-primary py-3 px-5" type="submit" value="view"
                                        <?php if (isset($_POST['batch_sel']) && $_POST['batch_sel'] == '-'): ?>
                                            disabled="disabled"
                                        <?php endif; ?>
                                    >View</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; padding-top:30px;">
            <?php if (!empty($_POST['course_data'])): ?>
                <h3 class="text-primary text-uppercase mb-2"><?php echo $_POST['course_data']['Course_Name'] ?></h3>
                <h1 class="display-6 mb-5">Batch <?php echo $_POST['batch_sel'] ?></h1>
            <?php endif; ?>
            </div>

            <div class="row g-0">
                <?php if (!empty($_POST['alumni'])): ?>
                    
                    <?php foreach ($_POST['alumni'] as $alumni) : ?>            
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="row g-0 
                                <?php if ($alumni['reverse'] === true): ?>
                                    flex-sm-row-reverse
                                <?php else: ?>
                                    flex-sm-row
                                <?php endif; ?>
                                ">
                                <div class="col-sm-6">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid" src="<?php echo $alumni['picture'] ?>" alt="<?php echo $alumni['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="h-100 p-5 d-flex flex-column justify-content-between">
                                        <div class="mb-3">
                                            <h5><?php echo $alumni['name'] ?></h5>
                                            <span><?php echo $alumni['info'] ?></span>
                                        </div>
                                        <p><?php echo $alumni['desc'] ?></p>
                                        <div class="d-flex">
                                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" disabled href=""><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="padding-top:100px;">
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
        <!-- Profile End -->



<?php
    require_once 'views/footer.php';
?>