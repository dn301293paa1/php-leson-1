<?php


require 'interface/UserRepositoryInterface.php';
require 'interface/SMSServiceInterface.php';
require 'interface/EmailServiceInterface.php';
require 'Repositories/UserRepository.php';
require 'Services/EmailService.php';
require 'Services/SMSService.php';
require 'UserService.php';

$userRepository = new Db();
$emailService = new EmailService();
$smsService = new SMSService();

$userService = new UserService($userRepository, $emailService, $smsService);

$userData = [
    'email' => 'test@.gmail.com',
    'phone' => '+3067777777',
];

$userService->registerUser($userData);