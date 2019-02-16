<?php

/**
 * Обработка вопросов
 */

namespace core\classes;

class Question
{
    const MIN_LEVEL = 0;
    const MAX_LEVEL = 100;
    const NUM_QUESTIONS = 40;

    private $pdo = null;

    public function __construct()
    {
        $this->pdo = Db::$pdo;
    }

    /**
     * Обновление/добавление вопроса
     *
     * @param $data
     *
     * @return mixed
     */

    public function save($data)
    {

        $queryData = $data;
        if ($data['id']) {
            $id = $data['id'];
            unset($data['id']);
        } else {
            $id = null;
        }
        foreach ($data as $key => $value) {
            $set[] = $key . " = :" . $key;
        }
        if (is_array($this->getRow($id))) {
            $rowQuery = "UPDATE questions SET " . implode(',', $set) . " WHERE id = :id ";

        } else {
            $rowQuery = ""
                . " INSERT INTO qusestions  "
                . "     (" . implode(',', array_keys($queryData)) . ") "
                . " VALUES "
                . "     (:" . implode(', :', array_keys($queryData)) . ") ";

        }

        $preparedQuery = $this->pdo->prepare($rowQuery);

        return $preparedQuery->execute($queryData);

    }

    /**
     * Выборка вопроса по ID
     *
     * @param integer $id - id вопроса
     *
     * @return mixed
     */

    public function getRow($id)
    {
        $rowQuery = "SELECT * FROM questions where id = :id";
        $preparedRowQuery = $this->pdo->prepare($rowQuery);
        $queryData = ['id' => $id];
        $preparedRowQuery->execute($queryData);

        return $preparedRowQuery->fetch(\PDO::FETCH_ASSOC);

    }

    /**
     * Выбор списка вопросов
     *
     * @param int $limit - сколько вопросов выбирать
     *
     * @return mixed
     */

    public function getList($limit = 40)
    {

        $listQuery = "SELECT * FROM questions ORDER BY used ASC LIMIT 0, {$limit}";
        $resQuery = $this->pdo->query($listQuery);
        $result = $resQuery->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }

    /**
     * Среднее значение использований вопроса
     * @return float
     */

    public function getAverageUsed()
    {

        $listQuery = "SELECT ROUND(AVG(used)) as average FROM questions";
        $resQuery = $this->pdo->query($listQuery);
        $result = $resQuery->fetchColumn();

        return $result;

    }

    /**
     * Выборка вопросов для теста, с учетом показов
     *
     * @return mixed
     */

    public function getRandomList()
    {

        $average = $this->getAverageUsed();

        $listQuery = ""
            . " SELECT "
            . "   *, "
            . "   (RAND()*(used/{$average}-1)+1) as prob "
            . " FROM questions "
            . " ORDER BY prob ASC "
            . " LIMIT 40 ";
        $resListQuery = $this->pdo->query($listQuery);
        $result = $resListQuery->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }

    /**
     * Выборка диапазона сложности вопросов
     *
     * @return mixed
     */

    public function getDiffLevel()
    {

        $diffQuery = "SELECT MIN(level) as min_d, MAX(level) as max_d FROM questions ";

        $resDiffQuery = $this->pdo->query($diffQuery);
        $result = $resDiffQuery->fetch(\PDO::FETCH_ASSOC);

        return $result;

    }

}
