<?php

    if (!empty($_SESSION['news_list']) && is_array($_SESSION['news_list'])) {
        # News
        $html = '
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-file-earmark-post"></i>
                        News
                    </a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
        ';
        foreach ($_SESSION['news_list'] as $news) {
            $html .= '<a href="index.php?menu=news&nkey='.$news['News_Key'].'" class="dropdown-item">'.$news['News_Title'].'</a>';
        }
        $html .= '
                    </div>
                </div>
        ';
        
        echo $html;
    }

?>