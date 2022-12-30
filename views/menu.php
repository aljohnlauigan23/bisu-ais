
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
                <a href="index.php?menu=home" class="nav-item nav-link 
                    <?php if (isset($_POST["home"]) && $_POST["home"] == "home"): ?>
                        active
                    <?php endif; ?>
                    ">
                    <i class="bi bi-house-door-fill"></i>
                    Home
                </a>
                <a href="index.php?menu=alumni" class="nav-item nav-link">
                    <i class="bi bi-people-fill"></i>
                    Alumni
                </a>
                <a href="index.php?menu=gallery" class="nav-item nav-link">
                    <i class="bi bi-images"></i>
                    Gallery
                </a>
            </div>
            <a href="index.php?menu=home" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">BISU-BC AIS</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <?php require_once 'views/menu_news.php' ?>
                <?php require_once 'views/menu_user.php' ?>
                <?php if (!empty($_SESSION['logged']) && $_SESSION['logged']['User_Type'] != 'admin' && isset($_GET["menu"]) && $_GET["menu"] != "chat"): ?>
                    <a href="index.php?menu=chat" class="nav-item nav-link">
                        <i class="bi bi-chat-left-text"></i>
                        Chat
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->