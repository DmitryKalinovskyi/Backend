<?php

namespace MVCExample\controllers;

use Framework\attributes\Routing\Route;
use Framework\mvc\ControllerBase;
use MVCExample\db\MVCDatabaseContext;

class PortfolioController extends ControllerBase
{
    private MVCDatabaseContext $_db;

    public function __construct(MVCDatabaseContext $db){
        $this->_db = $db;
    }

    #[Route("index")]
    public function Index(){
        echo "Hello!";
//        $id = 0;
//
//        $user = $this->_db->users->select()
//            ->where("id = :id")
//            ->first([":id"=>$id]);
//
//        if($user == 0)
//        {
//            http_response_code(404);
//            echo "Not founded.";
//            return;
//        }
//
//        var_dump(json_encode($user));
    }

    #[Route("test")]
    public function Test(){
        echo "Test";
    }
}