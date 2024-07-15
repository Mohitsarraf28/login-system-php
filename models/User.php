<?php
// models/User.php
require_once '../config/database.php';

class User {
    private $conn;
    private $table = 'users';

    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table . " SET username=:username, email=:email, password=:password";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // hash the password before saving it to the database
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $hashed_password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function login() {
        $query = "SELECT id, username, email, password FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->email = htmlspecialchars(strip_tags($this->email));

        // bind value
        $stmt->bindParam(":email", $this->email);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $stored_password_hash = $row['password'];

            // Debugging output
            echo "Stored hash: " . $stored_password_hash . "<br>";
            echo "Provided password: " . $this->password . "<br>";

            if (password_verify($this->password, $stored_password_hash)) {
                return true;
            } else {
                echo "Password verification failed.<br>";
            }
        } else {
            echo "No user found with the provided email.<br>";
        }

        return false;
    }
}
?>
