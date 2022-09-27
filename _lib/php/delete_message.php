<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
        header('Location: /admin/login');
    }

    if(!isset($_GET['id'])) {
        header('HTTP/1.1 400 Bad Request');
        header('Content-Type: application/json; charset=UTF-8');
        header('Location: /admin');
        die(json_encode(array('message' => 'Bad Request', 'code' => 400)));
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/_lib/php/safemysql.class.php';
    $db = new SafeMySQL();
    if($_SESSION['admin'] == true) {
        $db->query("DELETE FROM `messages` WHERE `message_id` = ?i", $_GET['id']);
    }
