<?php
// controllers/UserController.php
require_once '../models/User.php';

class UserController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function register($username, $email, $password) {
        $this->user->username = $username;
        $this->user->email = $email;
        $this->user->password = $password;

        if ($this->user->register()) {
            return "Registration successful!";
        } else {
            return "Registration failed.";
        }
    }

    public function login($email, $password) {
        $this->user->email = $email;
        $this->user->password = $password;

        if ($this->user->login()) {
            return "Login successful!";
        } else {
            return "Login failed.";
        }
    }

    public function getUser() {
        return $this->user;
    }
}
?>
