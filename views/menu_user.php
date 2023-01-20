<?php
    $html = '';
    # User Account
    if (!empty($_SESSION['logged']) && $_SESSION['logged'] != 'guest' && isset($_GET["menu"]) && $_GET["menu"] != "login") {
        # Logged
        $html .= '
            <div class="nav-item dropdown">
                <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> '.$_SESSION['logged']['First_Name'].'
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                    <a href="index.php?menu=profile&ukey='.$_SESSION['logged']['User_Key'].'" class="dropdown-item">Profile</a>
                    <a href="index.php?menu=association" class="dropdown-item">Association</a>
                    <a href="index.php?logout=1" class="dropdown-item">Logout</a>
                </div>
            </div>
        ';
        if ($_SESSION['logged']['User_Type'] == 'admin') {
            $is_active = isset($_POST['manage']) && $_POST['manage'] == 'manage' ? ' active' : '';
            $html .= '
            <div class="nav-item dropdown">
                <a href="index.php" class="nav-link dropdown-toggle'.$is_active.'" data-bs-toggle="dropdown">
                    <i class="bi bi-gear-fill"></i>
                    Manage
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                    <a href="manage.php?menu=courses" class="dropdown-item">Courses</a>
                    <a href="manage.php?menu=alumni" class="dropdown-item">Alumni</a>
                    <a href="manage.php?menu=events" class="dropdown-item">Events</a>
                    <a href="manage.php?menu=news" class="dropdown-item">News</a>
                </div>
            </div>
            ';
        } elseif ($_SESSION['logged']['User_Key'] > 0) {
            $is_active = isset($_POST['manage']) && $_POST['manage'] == 'manage' ? ' active' : '';
            $html .= '
            <div class="nav-item dropdown">
                <a href="index.php" class="nav-link dropdown-toggle'.$is_active.'" data-bs-toggle="dropdown">
                    <i class="bi bi-gear-fill"></i>
                    Manage
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                    <a href="manage.php?menu=news" class="dropdown-item">News</a>
                </div>
            </div>
            ';
        }
    } else {
        # Guest Mode
        $html .= '
            <a href="index.php?menu=login" class="nav-item nav-link">
                Login
                <i class="bi bi-box-arrow-left"></i>
            </a>
        ';
    }

    echo $html;

?>