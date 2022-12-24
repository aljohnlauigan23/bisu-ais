<?php
    $html = '';
    
    # User Account
    if (!empty($_SESSION['logged'])) {
        # Logged
        $html .= '
            <div class="nav-item dropdown">
                <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> '.$_SESSION['logged']['First_Name'].'
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                    <a href="index.php" class="dropdown-item">Profile</a>
                    <a href="index.php" class="dropdown-item">Logout</a>
                </div>
            </div>
        ';
        if ($_SESSION['logged']['User_Type'] == 'admin') {
            $html .= '
            <div class="nav-item dropdown">
                <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-gear-fill"></i>
                    Manage
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                    <a href="manage.php?menu=courses" class="dropdown-item">Courses</a>
                    <a href="manage.php?menu=alumni" class="dropdown-item">Alumni</a>
                    <a href="manage.php?menu=alumni" class="dropdown-item">Events</a>
                    <a href="manage.php?menu=alumni" class="dropdown-item">News</a>
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