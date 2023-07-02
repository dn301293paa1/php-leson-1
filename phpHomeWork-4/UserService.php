<?php

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected EmailServiceInterface $emailService,
        protected SMSServiceInterface $smsService
    ) {
        $this->userRepository = $userRepository;
        $this->emailService = $emailService;
        $this->smsService = $smsService;
    }

    public function registerUser(array $userData): void
    {
        $this->userRepository->insertUser($userData);
        $this->emailService->sendWelcomeEmail($userData['email']);
        $this->smsService->sendSMS($userData['phone'], "Вітаємо з реєстрацією!");
    }
}