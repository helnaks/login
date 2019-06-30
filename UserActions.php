<?php

class functions
{
    function __construct() {
        require_once 'header.php';
        require_once 'UserModel.php';
        $this->user = new UserModel();
    }

    /**
     * Register new user
     *
     * @param array $data
     * @return void
     */
    function registerUser(array $data)
    {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $formData = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'dob' => date('Y-m-d', strtotime($data['dob'])),
            'email' => $data['email'],
            'password' => $password
        ];

        if ($this->user->validteEmail($data['email'])) {
            $_SESSION['signup_error'] = 'Email already exists';
            header('location:index.php');
            exit;
        }
        $this->user->insert($formData);
        header('location:index.php');
    }

    /**
     * Login user
     *
     * @param array $data
     * @return void
     */
    function login(array $data)
    {
        $loginData = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (!$this->user->validateUser($loginData)) {
            $_SESSION['login_error'] = 'Invalid user details';
            header('location:index.php');
        } else {
            $_SESSION['loginUser'] = $this->user->validateUser($loginData);
            $_SESSION['userEmail'] = $data['email'];
            header('location:home.php');
        }
    }
}

if (isset($_POST)) {
    $action = $_POST['submit'];
    $obj = new functions();
    if ($action == 'signup'){
        $obj->registerUser($_POST);
    } else {
        $obj->login($_POST);
    }
}