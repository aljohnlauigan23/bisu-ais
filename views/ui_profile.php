<?php

require_once 'views/header.php';
require_once 'views/menu.php';

?>

<!-- Profile Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-3 img-twice position-relative h-100">
                    <div class="col-6">
                        <img class="img-fluid bg-light p-3" src="<?php echo $_POST['profile']['Image'] ?>" alt="">
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <p class="text-primary text-uppercase mb-2">Profile</p>
                    <h1 class="display-6 mb-4"><?php echo $_POST['profile']['Full_Name'] ?></h1>

                    <?php if (intval($_GET['ukey']) > 0): ?>
                        <form action="index.php?menu=profile" method="POST">
                        <div class="row g-3">
                            <?php foreach ($_POST['profile_fields'] as $field => $editable) : ?>
                                <div class="col-12 m-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="<?php echo $field ?>" name="<?php echo $field ?>" 
                                            value="<?php echo $_POST['profile'][$field] ?>"
                                            <?php if (!$editable): ?>
                                                disabled="disabled"
                                            <?php endif; ?>
                                            placeholder="Course Code">
                                        <label for="<?php echo $field ?>"><?php echo str_replace('_',' ', $field) ?></label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-12 text-center">
                                <input type="hidden" name="add" value="course" />
                                <button class="btn btn-primary py-3 px-5" type="submit" name="edit" value="Edit">Save</button>
                            </div>
                        </div>
                    </form> 
                    <?php else: ?>
                        <p><strong>System Administrator</p>
                    <?php endif; ?>  

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile End -->

<?php

require_once 'views/footer.php';

?>