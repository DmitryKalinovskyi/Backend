<?php

namespace MVCExample\models;

use Framework\attributes\Key;

class NewsTopic
{
    #[Key]
    public int $id;

    public string $imageUrl;

    public string $title;

    public string $description;

    public ?int $ownerId;

    public ?string $newsReference;
}