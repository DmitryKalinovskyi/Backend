<?php

namespace MVCExample\services;

use MVCExample\db\MVCDatabaseContext;
use MVCExample\models\User;

class RegisterService implements IRegisterService
{
    private MVCDatabaseContext $db;
    public function __construct(MVCDatabaseContext $db){
        $this->db = $db;
    }

    public function registerAccount(User $user): void
    {
        $this->db->users->insert($user);
    }

    public function deleteAccount(User $user): void
    {
        $this->db->users->delete()
        ->where("id = :id")
        ->execute([':id' => $user->id]);
    }
}