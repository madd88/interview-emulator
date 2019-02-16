<?php

namespace core;

use core\classes\View;
use core\classes\Question;

class QuestionController extends Controller
{
    protected $title;

    public function __construct()
    {
        parent::__construct(new View);
    }

    public function index()
    {

        $this->title = 'Задачник';

        $content = $this->view->render('index', ['data' => [], 'pagination' => 1], true);
        $this->render($content);
    }

    public function generateQuestionLevel(){

        $level = explode(';', $_REQUEST['level']);

        $question = new Question();
        $list = $question->getList(100);

        if(count($list) > 0){
            foreach ($list as $item) {
                $data = [
                    'id'    => $item['id'],
                    'level' => rand($level[0], $level[1]),
                    'used'  => ++$item['used']
                ];
                if(!$question->save($data)){
                    throw new \Exception('Ошибка записи вопросов');
                }
            }
        }

        echo json_encode(['success' => true]);

        return true;

    }



    // Неизвестная страница
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
