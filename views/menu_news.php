<?php
    $html = '';

    # News
    $html .= '
            <div class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-file-earmark-post"></i>
                    News
                </a>
                <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
    ';
    foreach ($_SESSION['news_list'] as $news_key => $news) {
        $html .= '<a href="index.php?news='.$news_key.'" class="dropdown-item">'.$news.'</a>';
    }
    $html .= '
                </div>
            </div>
    ';
    
    echo $html;

?>