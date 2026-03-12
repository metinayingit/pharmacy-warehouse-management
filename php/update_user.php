<?php
require_once 'db.php';
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'admin') { 
    die("Unauthorized"); 
}

if(isset($_POST['id']) && isset($_POST['role'])) {
    $id = $_POST['id'];
    $role = $_POST['role'];

    $allowedRoles = ['admin', 'pharmacist', 'technician'];
    if(!in_array($role, $allowedRoles)) { die("Forbidden"); }

    try {
        $db = (new Database())->getConnection();
        
        if ($id == $_SESSION['staff_id'] && $role !== 'admin') {
            die("Cannot demote yourself");
        }

        $stmt = $db->prepare("UPDATE staff SET role = :role WHERE id = :id");
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);
        
        if($stmt->execute()) { echo "success"; }
    } catch(PDOException $e) { echo "error"; }
}
?>