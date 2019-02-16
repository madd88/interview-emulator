<?php

/**
 * Эмулятор теста
 */

namespace core\classes;

class Test
{
    const MIN_IQ = 0;
    const MAX_IQ = 100;

    private $pdo = null;

    public function __construct()
    {
        $this->pdo = Db::$pdo;
    }

    public function emulateTest($questionList, $iq){
        $num = 0;
        $right = 0;
        foreach ($questionList as $question) {

            $chance = $iq * (100 - $question['level']) / 100 * $iq/15;
            if($question['level'] == 100 || $iq == 0){
                $chance = 0;
            }
            elseif ($iq == 100){
                $chance = 100;
            }
            elseif ($question['level'] == 0){
                $chance = 100;
            }


            $answer = (rand(0, 100) < $chance);
            $right += ($answer === true) ? 1 : 0;
            $results[] = [
                 ++$num,
                $question['id'],
                $question['used'],
                $question['level'],
                $answer
            ];


        }
        array_unshift($results, [$right]);
        return $results;


    }

}
