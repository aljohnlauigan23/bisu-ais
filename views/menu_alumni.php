
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
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" >BSIT</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="index.php" class="dropdown-item">Hudyaka 2022</a>
                        <a href="index.php" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">BSCS</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="index.php" class="dropdown-item">Profile</a>
                        <a href="index.php" class="dropdown-item">Logout</a>
                        
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">BSIT-FPSM</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="index.php" class="dropdown-item">Profile</a>
                        <a href="index.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <a href="index.php?menu=home" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">BISU-BC AIS</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">BS-ELEC</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="index.php" class="dropdown-item">Hudyaka 2022</a>
                        <a href="index.php" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">BS-ELEX</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="index.php" class="dropdown-item">Profile</a>
                        <a href="index.php" class="dropdown-item">Logout</a>
                        
                    </div>
                </div>
                
                <?php require_once 'views/menu_user.php' ?>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->