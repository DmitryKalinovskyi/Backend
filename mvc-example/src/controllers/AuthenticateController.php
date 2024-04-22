<?php

namespace MVCExample\controllers;

use Framework\attributes\Requests\HttpPost;
use Framework\attributes\Routing\Route;
use Framework\mvc\ControllerBase;

class AuthenticateController extends ControllerBase
{
    #[Route('login')]
    public function Login(): void{

    }

    #[Route('login')]
    #[HttpPost]
    public function LoginPost(): void{

    }


    #[Route('logout')]
    #[HttpPost]
    public function LogoutPost(){

    }

    #[Route("register")]
    public function Register(){

    }

    #[Route("register")]
    #[HttpPost]
    public function RegisterPost(){

    }
}