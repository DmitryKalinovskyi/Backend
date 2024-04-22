<?php

namespace MVCExample\models;

use Framework\attributes\Key;

class User
{
    #[Key]
    public int $id;
    public string $name;
    public string $surname;
    public string $email;
    public string $password;
}