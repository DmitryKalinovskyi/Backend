<?php

namespace MVCExample\controllers;

use Framework\attributes\Routing\Route;
use Framework\mvc\ControllerBase;
use MVCExample\services\IAuthenticateService;

class ProfileController extends ControllerBase
{
    private IAuthenticateService $authenticateService;
    public function __construct(IAuthenticateService $authenticateService){
        $this->authenticateService = $authenticateService;
    }

    #[Route('/')]
    public function MyProfile(): void{
        if($this->authenticateService->isLoggedIn() === false)
        {
            $this->redirect("/mvc-example/news");
            return;
        }

        $user = $this->authenticateService->getUser();

        $this->render("profile.php", ["user" => $user]);
    }
}