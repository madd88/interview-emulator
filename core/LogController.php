<?php

namespace core;

use core\classes\Log;
use core\classes\View;


class LogController extends Controller
{
    protected $title;

    public function __construct()
    {
        parent::__construct(new View);
    }

    /**
     *  Страница результатов
     */

    public function index()
    {

        $logModel = new Log();
        $list = $logModel->getList();
        $content = $this->view->render('log', ['data' => $list, 'pagination' => 1], true);
        $this->render($content);

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
