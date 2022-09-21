<?php
    if(!isset($_SESSION)) session_start();
    $_SESSION['messages'] = $_SESSION['messages']++ ?? 1;

    if(!(isset($_POST['name'])
        && isset($_POST['email'])
        && isset($_POST['message'])
        && $_POST['message'] != ''
        && isset($_SESSION['messages'])
        && $_SESSION['messages'] <= 3)) {
        
        header('HTTP/1.1 400 Bad Request');
        header('Content-Type: application/json; charset=UTF-8');
        header('Location: index.php');
        die(json_encode(array('message' => 'Bad Request', 'code' => 400)));
    }
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_lib/php/safemysql.class.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $db = new SafeMySQL();
    $db->query("INSERT INTO `messages` SET ?u", array(
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ));

    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json; charset=UTF-8');
    header('Location: index.php');
    die(json_encode(array('message' => 'Message Send', 'code' => 200)));
