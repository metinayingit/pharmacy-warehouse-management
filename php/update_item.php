<?php
require_once 'db.php';
session_start();

if(!isset($_SESSION['logged_in'])) { die("Unauthorized"); }

if(isset($_POST['id']) && isset($_POST['field']) && isset($_POST['value'])) {
    $id = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    $allowedFields = ['stock', 'price', 'name', 'serial_number', 'expiry_date', 'description'];
    if(!in_array($field, $allowedFields)) { die("Forbidden"); }

    if ($_SESSION['role'] === 'technician' && $field !== 'stock') {
        die("error");
    }

    try {
        $db = (new Database())->getConnection();
        $query = "UPDATE medicines SET $field = :value WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':id', $id);
        
        if($stmt->execute()) { echo "success"; }
    } catch(PDOException $e) { echo "error"; }
}
?>