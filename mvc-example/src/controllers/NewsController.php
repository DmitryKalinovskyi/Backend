<?php

namespace MVCExample\controllers;

use Framework\attributes\Requests\HttpPost;
use Framework\attributes\Routing\Route;
use Framework\http\HttpContext;
use Framework\mvc\ControllerBase;
use MVCExample\db\MVCDatabaseContext;
use MVCExample\models\NewsTopic;

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
        $this->render("topiccreate.php");
    }

    #[Route("new-topic")]
    #[HttpPost]
    public function NewTopicPost(): void{
        // get info about topic and store it in database

        $newsTopic = new NewsTopic();

        $newsTopic->title = $_POST['title'];
        $newsTopic->description = $_POST['description'];
        $newsTopic->newsReference = $_POST['newsReference'];
        $newsTopic->imageUrl = $_POST['imageUrl'];

//        $newsTopic->ownerId = $_POST['title'];

        $this->_db->news->insert($newsTopic);
        $this->redirect("/mvc-example/news");
    }
}