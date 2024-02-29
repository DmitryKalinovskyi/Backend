<?php

namespace Models;


/**
 * Defines table (User) in the database
 *
 * name - name of the user
 *
 * age - age of the user
 */

class UserModel
{
    public string $name;

    public int $age;

    public function __construct($name, $age){
        $this->age = $age;
        $this->name = $name;
    }

}