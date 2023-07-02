<?php

interface UserRepositoryInterface
{
    public function insertUser(array $userData): void;
}