
        <?php if (isset($_POST['warning']) && $_POST['warning'] != ''): ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_POST['warning'] ?>
            </div>
        <?php elseif (isset($_POST['success']) && $_POST['success'] != ''): ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_POST['success'] ?>
            </div>
        <?php endif; ?>