<?php

class User {


    public function __construct(private Authenticator $authenticator,private  ProfileManager $profileManager) {
        $this->authenticator = $authenticator;
        $this->profileManager = $profileManager;
    }

    public function authenticate($username, $password, $role) {
        $this->authenticator->authenticate($username, $password, $role);
    }

    public function displayProfile($userId) {
        $this->profileManager->displayProfile($userId);
    }
}
