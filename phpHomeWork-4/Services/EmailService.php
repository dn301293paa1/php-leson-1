<?php

class EmailService implements EmailServiceInterface
{
    public function sendWelcomeEmail(string $email): void
    {
        // // Відправка ласкаво просимо повідомлення електронною поштою
        echo "// Відправка ласкаво просимо повідомлення електронною поштою зв адресою $email" . PHP_EOL;
    }
}