<?php
require_once('../config/database.php');


class AuthController {
    public function login($email, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT id, password FROM Users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['user_id'] = $id;
            header("Location: ../public/index.php");
        } else {
            echo "Invalid credentials";
        }
        $stmt->close();
    }

    public function register($name, $email, $password, $role) {
        global $conn;
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO Users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
        $stmt->execute();
        $stmt->close();
    }
}
?>
