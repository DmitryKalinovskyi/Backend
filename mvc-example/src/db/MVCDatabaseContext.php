<?php

namespace MVCExample\db;

use Framework\orm\DBContext;
use Framework\orm\DBSet;
use MVCExample\models\NewsTopic;
use MVCExample\models\User;

class MVCDatabaseContext extends DBContext
{
    public DBSet $users;

    public DBSet $news;

    public function __construct($connectionString, $username = "root", $password = "")
    {
        parent::__construct($connectionString, $username, $password);

        $this->users = new DBSet("users", User::class, $this);
        $this->news = new DBSet("news", NewsTopic::class, $this);
    }
}