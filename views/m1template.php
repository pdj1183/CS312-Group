<head>
    <meta charset="utf-8" />
</head>

<nav>
    <h1 class="navItem">The Color Company</h1>
    <ul class="navbar">
        <li class="navItem <?php if($current_page == 'home') echo 'active'; ?>">
            <a href="./index">Home</a>
        </li>
        <li class="navItem <?php if($current_page == 'color') echo 'active'; ?>">
            <a href="./color">Color Generator</a>
        </li>
        <li class="navItem <?php if($current_page == 'about') echo 'active'; ?>">
            <a href="./about">About</a>
        </li>
    </ul>
</nav>

<body>
    <main>
        <?php echo $content?>
    </main>
</body>