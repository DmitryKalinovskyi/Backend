<?php

namespace Controllers;

use Models\UserModel;

/**
 * User controller, manages all actions related to user
 *
 */
class UserController
{

    /**
     * Function that display (renders) web page, by given path
     *
     * @param $path - path to the view located at Views folder
     * @param $data - information required to render web-page
     * @return void
     */
    protected function Render($path, $data): void{
        extract($data);

        include "Views/$path";
    }


    /**
     * Basic controller function
     *
     * @return void
     */
    public function Index(): void{
        $user = new UserModel("Dima", 18);

        $this->Render("userView.php",['user' => $user]);
    }
}