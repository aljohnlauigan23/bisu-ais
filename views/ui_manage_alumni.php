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
                <h1 class="display-6 mb-5">ALUMNI</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="manage.php?menu=alumni" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <p class="text-primary text-uppercase mb-2">Select TSV (Tab Separated Values) file to upload Alumni List</p>
                            <div class="col-md-9">
                                <input type="file" name="upload_csv" accept="text/tsv" class="form-control form-control-lg" id="upload_csv" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="hidden" name="add" value="alumni" />
                                <input type="hidden" name="course_sel" value="<?php echo $_POST['course_sel'] ?>" />
                                <input type="hidden" name="batch_sel" value="<?php echo $_POST['batch_sel'] ?>" />
                                <button class="btn btn-primary py-3 px-5" type="submit">Save Alumni</button>
                            </div>
                        </div>
                    </form>
                    <br/><br/>
                    <form action="manage.php?menu=alumni" method="POST">
                        <div class="row g-3">
                            <h2>Alumni List</h2>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-control selectpicker"  id="course" name="course">
                                        <?php foreach ($_SESSION['courses'] as $dept => $courses) : ?>
                                            <?php foreach ($courses as $course_code => $course_name) : ?>
                                                <option value="<?php echo $course_code ?>" 
                                                    <?php if ($course_code == $_POST['course_sel']): ?>
                                                        selected="selected"
                                                    <?php endif; ?>
                                                ><?php echo $dept.': '.$course_name ?></option>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="course">Course</label>
                                </div>
                            </div>
                            <div class="col-md-9">
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
                            <div class="col-md-3 text-center">
                                <input type="hidden" name="view" value="alumni" />
                                <input type="hidden" name="course_sel" value="<?php echo $_POST['course_sel'] ?>" />
                                <input type="hidden" name="batch_sel" value="<?php echo $_POST['batch_sel'] ?>" />
                                <button class="btn btn-primary py-3 px-5" type="submit" value="view"
                                    <?php if ($_POST['batch_sel'] == '-'): ?>
                                        disabled="disabled"
                                    <?php endif; ?>
                                >View Alumni</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div style="padding-top:30px">
                    <?php
                        require_once 'views/ui_table.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
    require_once 'views/footer.php';
?>
