<?php

use Everytask\Backend\Login;
use Everytask\Backend\Register;

require_once 'vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

// gets Input from the request
$phpInput = file_get_contents('php://input');

// Decodes the input
$POST = json_decode($phpInput, true);

// Checks if the user exists and if the password is correct
if (isset($POST['action']) && $POST['action'] == 'login') {
    $user = new Login($POST['email'], $POST['password']);
    if ($user->checkCredentials()) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

// Checks if register credentials matching requirements and create account
if (isset($POST['action']) && $POST['action'] == 'register') {
    $user = new Register($POST['email'], $POST['password'], $POST['username']);
    if ($user->validateRegister()) {
        echo json_encode(array('Registration Data' => 'allowed'));
        $user->createAccount();
    } else {
        echo json_encode(array('Registration Data' => 'not allowed'));
    }
}