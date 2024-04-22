<?php

namespace MVCExample\controllers;

use Framework\attributes\Requests\HttpPost;
use Framework\attributes\Routing\Route;
use Framework\mvc\ControllerBase;
use MVCExample\models\User;
use MVCExample\services\IAuthenticateService;
use MVCExample\services\IRegisterService;

class AuthenticateController extends ControllerBase
{
    private IAuthenticateService $authenticateService;
    private IRegisterService $registerService;
    public function __construct(IAuthenticateService $authenticateService,
                                IRegisterService $registerService){
        $this->authenticateService = $authenticateService;
        $this->registerService = $registerService;
    }


    #[Route('login')]
    public function Login(): void{
        $this->render("login.php");
    }

    #[Route('login')]
    #[HttpPost]
    public function LoginPost(): void{

        if($this->authenticateService->isLoggedIn()){
            echo "You already logged in.";
            return;
        }

        if(empty($_POST['email']))
            return;

        if(empty($_POST['password']))
            return;

        $password = $_POST['password'];
        $email = $_POST['email'];

        $user = $this->authenticateService->login($email, $password);

//        var_dump($user);
        $this->redirect("/mvc-example/news");
    }

    #[Route('logout')]
    #[HttpPost]
    public function LogoutPost(): void{
        $this->authenticateService->logout();

        $this->redirect("/mvc-example/news");
    }

    #[Route("register")]
    public function Register(): void{
        $this->render("register.php");
    }

    #[Route("register")]
    #[HttpPost]
    public function RegisterPost(): void{
        if($this->authenticateService->isLoggedIn())
            return;

        $user = new User();

        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        $this->registerService->registerAccount($user);

        $this->redirect("/mvc-example/news");
    }
}