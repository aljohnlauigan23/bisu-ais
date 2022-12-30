<?php
    require_once 'views/header.php';
    require_once 'views/menu.php';
?>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Manage</p>
                <h1 class="display-6 mb-5">COURSES</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="text-center mb-4">Select a Department to add a Course</p>
                    <form action="manage.php?menu=courses" method="POST">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-control selectpicker"  id="department" name="Department">
                                        <?php foreach ($_SESSION['departments'] as $dept => $dept_desc) : ?>
                                            <option value="<?php echo $dept ?>"><?php echo $dept.': '.$dept_desc ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="department">Department</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="course_code" name="Course_Code" placeholder="Course Code">
                                    <label for="course_code">Course Code</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="course_name" name="Course_Name" placeholder="Course Name">
                                    <label for="course_name">Course Name</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="hidden" name="add" value="course" />
                                <button class="btn btn-primary py-3 px-5" type="submit">Add course</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
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
