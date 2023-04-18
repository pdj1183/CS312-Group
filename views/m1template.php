<head>
    <meta charset="utf-8" />
    <?php echo Asset::css("main.css") ?>
</head>

<div class="nav">
    <nav>

        <ul class="navbar<?php if($current_page == 'home') echo 'active'; ?>">
            <li class="navItem">
                <h1>The Color Company</h1>
            </li>
            <li class="navItem <?php if($current_page == 'home') echo 'active'; ?>">
                <a href="./index">Home</a>
            </li>
            <li class="navItem <?php if($current_page == 'color') echo 'active'; ?>">
                <a href="./colorForm">Color Generator</a>
            </li>
            <li class="navItem <?php if($current_page == 'about') echo 'active'; ?>">
                <a href="./about">About</a>
            </li>
        </ul>
        <div class="navImg">
            <?php echo Asset::img("312logo.svg") ?>
        </div>
    </nav>
</div>

<div class="main">
    <?php echo $content?>
</div>