<?php

/**
 * Подключение к БД через PDO
 */

namespace core\classes;

class Db
{

    public static $pdo;

    public static function connect()
    {
        require_once('config/config.php');

        try {
            self::$pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        } catch (\PDOException $e) {
            echo 'Ошибка при подключении к базе данных!' . $e->getMessage() . '<br />';
        }
    }
}
