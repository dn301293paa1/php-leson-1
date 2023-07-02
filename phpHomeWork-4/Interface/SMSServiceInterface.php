<?php

interface SMSServiceInterface
{
    public function sendSMS(string $phone, string $message): void;
}