<?php
    use Dotenv\Dotenv;

    function login($name, $password) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . '/_secure');
        $dotenv->safeLoad();

        if($name == $_ENV['ADMIN_NAME'] && password_verify($password, $_ENV['ADMIN_PASSWORD'])) {
            session_start();
            $_SESSION['admin'] = true;
            header('Location: /admin');
        } else {
            header('HTTP/1.1 401 Unauthorized');
            header('Location: /admin/login');
        }
    }

if(isset($_POST['name']) && isset($_POST['password'])) {
    login($_POST['name'], $_POST['password']);
}