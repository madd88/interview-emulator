<?php

/**
 * Обработчик ajax запросов
 */

namespace core;

use core\classes\Log;
use core\classes\View;
use core\classes\Question;
use core\classes\Test;
use core\traits\CommonTrait;


class AjaxController extends Controller
{
    use CommonTrait;

    protected $title;

    public function __construct()
    {
        parent::__construct(new View);
    }


    public function index()
    {
       $content = $this->view->render('index', ['data' => [], 'pagination' => 1], true);
        $this->render($content);
    }

    /**
     * Обновление уровня сложности водпросов
     */

    public function generateQuestionLevel(){

        $questionModel = new Question();
        $list = $questionModel->getList(100);

        $level = explode(';', $_REQUEST['level']);

        if(
            !$this->checkRange($level[0], $questionModel::MIN_LEVEL, $questionModel::MAX_LEVEL) ||
            !$this->checkRange($level[1], $questionModel::MIN_LEVEL, $questionModel::MAX_LEVEL)
        ){
            echo json_encode(['success' => false, 'message' => 'Ошибка диапазона']);
        }

        if(count($list) > 0){
            foreach ($list as $item) {
                $data = [
                    'id'    => $item['id'],
                    'level' => rand($level[0], $level[1]),
                    'used'  => $item['used']
                ];
                if(!$questionModel->save($data)){
                    echo json_encode(['success' => false, 'message' => 'Ошибка записи сложности вопроса']);
                    return;
                }
            }
        }

        echo json_encode(['success' => true, 'message' => 'Настройки сохранены']);

    }


    /**
     * Получаем результаты теста и записываем результаты
     */
    public function getTestResult()
    {
        $questionModel = new Question();
        $testModel = new Test();
        $logModel = new Log();


        $randomList = $questionModel->getRandomList();

        $diffLevel  = $questionModel->getDiffLevel();

        $testResult = $testModel->emulateTest($randomList, $_REQUEST['iq']);

        $saveData = [
            'iq' => $_REQUEST['iq'],
            'diff' => implode("-", $diffLevel),
            'result' => $testResult[0][0] . ' / ' . $questionModel::NUM_QUESTIONS
        ];
        $logModel->saveResults($saveData);

        echo json_encode($testResult);

    }

    public function notFound()
    {
        parent::notFound();
        $this->title = 'Страница не найдена - 404';

        $content = $this->view->render('404', [], true);
        $this->render($content);
    }

    protected function render($content)
    {
        $params = [];
        $params['title'] = $this->title;
        $params['content'] = $content;
        $this->view->render(MAIN_LAYOUT, $params);
    }
}
