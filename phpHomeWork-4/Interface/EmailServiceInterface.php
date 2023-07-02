<?php

interface EmailServiceInterface
{
    public function sendWelcomeEmail(string $email): void;
}