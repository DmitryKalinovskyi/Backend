<?php

namespace MVCExample\services;

use MVCExample\db\MVCDatabaseContext;
use MVCExample\models\User;

class AuthenticateService implements IAuthenticateService
{
    const LOGGED_IN = "logged_in";
    const USER_ID = "used_id";

    private MVCDatabaseContext $db;
    public function __construct(MVCDatabaseContext $db){
        $this->db = $db;
    }

    #[\Override] public function isLoggedIn(): bool
    {
        return isset($_SESSION[self::LOGGED_IN]) and $_SESSION[self::LOGGED_IN] === true;
    }

    #[\Override] public function login(string $email, string $rawPassword): mixed
    {
        // use hashing for the password

         $user = $this->db->users->select()
            ->where("password = :password and email = :email")
            ->first([":email" => $email, ":password" => $rawPassword]);

         if($user === null or ($user instanceof User) === false){
             return null;
         }

         $_SESSION[self::LOGGED_IN] = true;
         $_SESSION[self::USER_ID] = $user->id;

         return $user;
    }

    #[\Override] public function logout(): void
    {
        $_SESSION[self::LOGGED_IN] = false;
    }

    public function getUser(): mixed
    {
        if($this->isLoggedIn() === false)
            return null;

        return $this->db->users->select()
            ->where("id = :id")
            ->first([":id" => $_SESSION[self::USER_ID]]);
    }
}