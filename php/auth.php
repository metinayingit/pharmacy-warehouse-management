<?php
session_start();
require_once 'db.php';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT id, username, role FROM staff WHERE username = :username AND password = :password LIMIT 1";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['logged_in'] = true;
        $_SESSION['staff_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        header("Location: ../index.php#login_success");
    } else {
        header("Location: ../index.php#login_failed");
    }
    exit();
}
?>