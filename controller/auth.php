<?php
require_once __DIR__ . "/database.php";

class Auth extends Database {

    public function register($name, $email, $password, $status)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO users (name, email, password, status) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssss", $name, $email, $hash, $status);

        return $stmt->execute();
    }

    public function login($email, $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }
}
