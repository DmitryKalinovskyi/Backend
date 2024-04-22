<?php

namespace MVCExample\controllers;

use Framework\attributes\Requests\HttpPost;
use Framework\attributes\Routing\Route;
use Framework\http\HttpContext;
use Framework\mvc\ControllerBase;
use MVCExample\db\MVCDatabaseContext;

class NewsController extends ControllerBase
{
    private MVCDatabaseContext $_db;
    public function __construct(MVCDatabaseContext $db){
        $this->_db = $db;
    }

    #[Route("/")]
    public function Index(): void{

        // load all news from the database
        $q = $this->_db->news
            ->select();

        $params = [];
        if(isset($_GET["title"])){
            $title = $_GET["title"];
            $params[':title'] = "%$title%";
            $q->where("title like :title");
        }

        $news = $q->limit(10)
            ->execute($params);

        $this->render("news.php", ["news" => $news]);
    }

    #[Route("new-topic")]
    public function NewTopic(){

    }

    #[Route("new-topic")]
    #[HttpPost]
    public function NewTopicPost(){

    }
}