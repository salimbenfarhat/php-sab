<?php
namespace PHP_SAB\Models;
use PHP_SAB\Database, PDO;

class UserModel {
    public function getUserById($userId) {
        $database = new Database();
        $conn = $database->getConnection();
        $query = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam(':id', $userId);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserByEmail($email) {
        $database = new Database();
        $conn = $database->getConnection();
        $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function createUser($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $verificationToken = bin2hex(random_bytes(32));
        $database = new Database();
        $conn = $database->getConnection();
        $emailExistsQuery = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $emailExistsQuery->bindParam(':email', $email);
        $emailExistsQuery->execute();
        if ($emailExistsQuery->rowCount() > 0) {
            return false;
        }
        $insertUserQuery = $conn->prepare("INSERT INTO users (email, password, is_verified) VALUES (:email, :password, 0)");
        $insertUserQuery->bindParam(':email', $email);
        $insertUserQuery->bindParam(':password', $hashedPassword);
        if (!$insertUserQuery->execute()) {
            var_dump($insertUserQuery->errorInfo());
        } else {
            $userId = $conn->lastInsertId();
            $insertTokenQuery = $conn->prepare("INSERT INTO verification_tokens (user_id, token, expires_at) VALUES (:user_id, :token, DATE_ADD(NOW(), INTERVAL 24 HOUR))");
            $insertTokenQuery->bindParam(':user_id', $userId);
            $insertTokenQuery->bindParam(':token', $verificationToken);
            if (!$insertTokenQuery->execute()) {
                var_dump($insertTokenQuery->errorInfo());
            } else {
                return [
                    'id' => $userId,
                    'email' => $email,
                    'is_verified' => 0,
                    'verification_token' => $verificationToken,
                ];
            }
        }
    }
    public function getUserByVerificationToken($token) {
        $database = new Database();
        $conn = $database->getConnection();
        $query = $conn->prepare("
            SELECT users.*, verification_tokens.token AS verification_token
            FROM users
            JOIN verification_tokens ON users.id = verification_tokens.user_id
            WHERE verification_tokens.token = :token
        ");
        $query->bindParam(':token', $token);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUserVerificationStatus($userId) {
        $database = new Database();
        $conn = $database->getConnection();
        $query = $conn->prepare("UPDATE users SET is_verified = 1 WHERE id = :id");
        $query->bindParam(':id', $userId);
        $query->execute();
    }
}
