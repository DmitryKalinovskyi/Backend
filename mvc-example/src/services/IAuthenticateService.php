<?php

namespace MVCExample\services;

interface IAuthenticateService
{
    public function isLoggedIn(): bool;

    public function login(string $email, string $rawPassword): mixed;

    public function logout(): void;

    public function getUser(): mixed;
}