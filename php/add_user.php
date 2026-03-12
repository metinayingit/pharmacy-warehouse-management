<?php
require_once 'db.php';
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'admin') { 
    die("Unauthorized Access"); 
}

if(isset($_POST['add_user'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); 
    $role = $_POST['role'];

    try {
        $db = (new Database())->getConnection();
        
        $checkStmt = $db->prepare("SELECT id FROM staff WHERE username = :username");
        $checkStmt->bindParam(':username', $username);
        $checkStmt->execute();
        
        if($checkStmt->rowCount() > 0) {
            echo "<script>alert('Error: This username already exists! Please choose another one.'); window.location.href='../index.php#staff_management';</script>";
            exit();
        }

        $query = "INSERT INTO staff (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':username' => $username, 
            ':password' => $password, 
            ':role' => $role
        ]);
        
        header("Location: ../index.php#staff_management");
        
    } catch(PDOException $e) { echo "Database Error: " . $e->getMessage(); }
}
?>