
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary"><? echo PAGE_TITLE ?></h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php?menu=home" class="nav-item nav-link ">Home</a>
                <?php foreach ($_SESSION['departments'] as $dept => $dept_desc) : ?>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle 
                            <?php if ($dept == $_POST['department']): ?>
                                active
                            <?php endif; ?>
                            " data-bs-toggle="dropdown" title="<?php echo $dept_desc ?>" ><?php echo $dept ?> Alumni
                        </a>
                        <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                            <?php foreach ($_SESSION['courses'][$dept] as $course => $desc) : ?>
                                <a href="index.php?menu=alumni&course=<?php echo $course ?>" class="dropdown-item"><?php echo $desc ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="index.php?menu=home" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">BISU-BC AIS</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <?php require_once 'views/menu_user.php' ?>
                <a href="chat.php" class="nav-item nav-link">
                    <i class="bi bi-chat-left-text"></i>
                    Chat
                </a>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->