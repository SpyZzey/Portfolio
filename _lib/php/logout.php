<?php
    if(!isset($_SESSION)) session_start();

    unset($_SESSION['admin']);
    session_destroy();
    header('HTTP/1.1 200 OK');
    header('Location: /');