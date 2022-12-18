<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
        header('Location: /admin/login');
        return;
    }
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_lib/php/get_message.php';
    $messages = getMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Simon Brebeck | Self-taught Full-Stack Developer</title>
    <link rel="stylesheet" href="/_lib/css/styles.css">
    <link rel="icon" type="image/png" href="/_assets/images/mainframe/favicon.webp">
    <link href="/_lib/css/material_icons.css" rel="stylesheet">
    <script src="/_lib/_modules/jQuery/jquery.min.js"></script>
    <script src="/_lib/js/app.js" defer></script>
    <!-- <script src="/_lib/js/mouse_particles.js" defer></script> -->
    <script type="text/javascript">
        function deleteMessage(id) {
            $.ajax({
                url: '/_lib/php/delete_message.php?id=' + id,
                type: 'DELETE',
                success: function(data) {
                    location.reload();
                }
            });
        }
    </script>
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
        <a href="/_lib/php/logout.php"><button class="button--outline logout-button">Logout</button></a>
        <a href="https://www.linkedin.com/in/simonbrebeck/" target="_blank" rel="noreferrer noopener"><img src="/_assets/images/brands/linkedin.webp" width="64" height="64" alt="LinkedIn"></a>
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
    <h2>Messages</h2>
    <div class="message-list">
        <?php foreach ($messages as $message) {?>
            <div class="message">
                <div class="message--header">
                    <h3><?= htmlspecialchars($message['name'], ENT_NOQUOTES) ?></h3>
                    <p><?= htmlspecialchars($message['timestamp'], ENT_NOQUOTES) ?></p>
                </div>
                <div class="message--content-item">
                    <h5>Von</h5>
                    <p><?= htmlspecialchars($message['email'], ENT_NOQUOTES) ?></p>
                </div>
                <div class="message--content-item">
                    <h5>Nachricht</h5>
                    <p><?= htmlspecialchars($message['message'], ENT_NOQUOTES) ?></p>
                </div>
                <div class="message--content-item">
                    <button class="button--icon delete dark-gray uppercase" onclick="deleteMessage(<?= $message['message_id']; ?>);">
                        <i class="material-icons">delete</i>
                        <span>Delete</span>
                    </button>
                </div>
            </div>
        <?php } ?>
</main>
<footer>
    <div class="footer-text">
        <p class="copyright">
            &copy; 2021-2022 Simon Brebeck
        </p>
    </div>
    <a href="/impress.html">Impress</a>
</footer>
</body>
</html>