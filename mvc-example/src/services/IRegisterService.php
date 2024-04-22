<?php

namespace MVCExample\services;

use MVCExample\models\User;

interface IRegisterService
{
    public function registerAccount(User $user);
    public function deleteAccount(User $user);
}