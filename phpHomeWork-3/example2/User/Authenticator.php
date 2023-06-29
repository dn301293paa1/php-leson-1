<?php

class Authenticator
{
    public function authenticate($username, $password, $role)
    {
      echo "Авторизация успешна {$username}" . PHP_EOL ;
    }
}
