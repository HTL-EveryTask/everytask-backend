<?php

namespace Everytask\Backend;

/**
 * Version: 1.0
 * Author: Kaminski
 * Date: 26.04.2022
 */


class User
{

    private $token;
    private $username;
    private $email;
    private $user_id;

    public function __construct($token, $username, $email, $user_id)
    {
        $this->email = $email;
        $this->tokem = $token;
        $this->username = $username;
        $this->user_id = $user_id;
    }




    public static function getToken_byEmail($email) {
        $sql = "SELECT token FROM account WHERE email = $email";
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':email' => $email));
        return $stmt->fetchAll();
    }



    public static function getUserID_byToken($token) {
        $sql = "SELECT pk_account_id FROM account WHERE token = $token";
        $stmt = $connect->prepare($sql);
        $stmt->execute(array(':token' => $token));
        return $stmt->fetchAll();
    }






    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

     /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}