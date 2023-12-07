<?php

namespace App;

class User
{
    # Properties
    private $username;
    private $date_joined;
    private $money;
    private $password;

    # Methods
    public function __construct($user_db)
    {
        $this->username = $user_db[0]['username'];
        $this->date_joined = $user_db[0]['date_joined'];
        $this->password = $user_db[0]['password'];
        $this->money = $user_db[0]['money'];
    }

    public function validateUser($password)
    {
        if ($password == $this->password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getDetails() {
        return [
            'username' => $this->username,
            'date_joined' => $this->date_joined,
            'money' => $this->money
        ];
    }

}