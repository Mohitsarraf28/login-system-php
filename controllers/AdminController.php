<?php
// controllers/AdminController.php
require_once '../models/User.php';

class AdminController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function getAllUsers() {
        return $this->user->getAllUsers();
    }

    public function updateUser($id, $username, $email, $role) {
        return $this->user->updateUser($id, $username, $email, $role);
    }

    public function deleteUser($id) {
        return $this->user->deleteUser($id);
    }

    public function resetPassword($id, $newPassword) {
        return $this->user->resetPassword($id, $newPassword);
    }
}
?>
