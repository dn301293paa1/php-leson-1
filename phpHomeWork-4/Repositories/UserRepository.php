<?php

class Db implements UserRepositoryInterface
{
    public function insertUser(array $userData): void
    {
        //$this->db->insert('users', $userData);
        echo "реєстрація успішна" . PHP_EOL;
    }


}
