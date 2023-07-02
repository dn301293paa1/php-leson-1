<?php

class SMSService implements SMSServiceInterface
{
    public function sendSMS(string $phone, string $message): void
    {
        // Відправка повідомлення на мобільний телефон
        echo "{$phone}  {$message} " . PHP_EOL;;
    }
}