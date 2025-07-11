<?php
    if(!isset($_SESSION)) session_start();
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        header('Location: /admin');
        return;
    }
?>

<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Simon Brebeck | Self-taught Full-Stack Developer</title>
    <link href="/_assets/fonts/material_icons.woff2" rel="preload" as="font" type="font/woff2" crossorigin="anonymous">
    <link href="/_assets/fonts/signika.woff2" rel="preload"  as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="stylesheet" href="/_lib/css/styles.css">
    <link rel="icon" type="image/png" href="/_assets/images/mainframe/favicon.webp">
    <link href="/_lib/css/material_icons.css" rel="stylesheet">
    <script src="/_lib/_modules/jQuery/jquery.min.js"></script>
    <script src="/_lib/js/app.js" defer></script>
    <!-- <script src="/_lib/js/mouse_particles.js" defer></script> -->
    </head>
<body>
<header>
    <div id="navigation-burger">
        <i class="material-icons navigation-burger--open">menu</i>
        <i class="material-icons navigation-burger--close">close</i>
    </div>
    <nav id="navigation-menu">
        <a href="/"><img src="/_assets/images/mainframe/favicon.webp" width="48" height="48" alt="Logo"></a>
        <a href="/">Home</a>
        <a href="/about/">About</a>
        <a href="/contact">Contact</a>
    </nav>
    <nav id="socials-menu">

        <a
                href="/_assets/downloads/CV_Simon_Brebeck.pdf"
                target="_blank"
                rel="noreferrer noopener"
                class="button button--icon button--outline dark-gray">
            <i class="material-icons">download</i>
            Résumé
        </a>        <a href="https://www.linkedin.com/in/simonbrebeck/" target="_blank" rel="noreferrer noopener"><img src="/_assets/images/brands/linkedin.webp" width="64" height="64" alt="LinkedIn"></a>
        <a href="https://github.com/SpyZzey" target="_blank" rel="noreferrer noopener"><img src="/_assets/images/brands/github.webp" width="64" height="64" alt="GitHub"></a>
    </nav>
</header>
<div id="navigation-drawer">
    <div class="navigation-drawer--menu">
        <a href="/">Home</a>
        <a href="/about/">About</a>
        
        <a href="/contact">Contact</a>
    </div>
</div>
<main class="page-contact">
    <h2>Login</h2>
    <form class="login-form card card--fw-text" action="/_lib/php/login.php" method="post">
        <div class="form-group floating-label-container">
            <label for="name">Name</label>
            <input type="text" class="text-field" name="name" id="name" required>
        </div>
        <div class="form-group floating-label-container">
            <label for="password">Password</label>
            <input type="password" class="text-field" name="password" id="password" required>
        </div>
        <button id="button--submit-message" type="submit" class="button--outline dark-gray particle-color">Login</button>
    </form>
</main>
<footer>
    <div class="footer-text">
        <p class="copyright">
            &copy; 2021-2025 Simon Brebeck
        </p>
    </div>
    <a href="/impress.html">Impress</a>
</footer>
</body>
</html>

