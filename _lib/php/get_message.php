<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_lib/php/safemysql.class.php';

    function getMessages(): array
    {
        $db = new SafeMySQL();
        return $db->getAll("SELECT * FROM messages");
    }
