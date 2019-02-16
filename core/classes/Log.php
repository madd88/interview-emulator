<?php

/**
 * Результаты тестирования
 */

namespace core\classes;

class Log
{
    const MIN_IQ = 0;
    const MAX_IQ = 100;

    private $pdo = null;

    public function __construct()
    {
        $this->pdo = Db::$pdo;
    }

    /**
     * Запись результатов
     *
     * @param array $arr
     */
    public function saveResults(array $arr)
    {

        $query = "INSERT INTO log VALUES (NULL, {$arr['iq']}, '{$arr['diff']}', '{$arr['result']}')";
        $this->pdo->query($query);
    }

    /**
     * Выборка результатов
     *
     * @return mixed
     */

    public function getList()
    {
        $listQuery = "SELECT * FROM log";
        $resListQuery = $this->pdo->query($listQuery);

        $result = $resListQuery->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }


}
