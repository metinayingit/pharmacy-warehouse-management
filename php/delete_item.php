<?php
require_once 'db.php';
session_start();

if(!isset($_SESSION['logged_in'])) { die("Unauthorized"); }

if(isset($_POST['id']) && isset($_POST['type'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];

    try {
        $db = (new Database())->getConnection();
        
        if($type === 'medicine') {
            $stmt = $db->prepare("DELETE FROM medicines WHERE id = :id");
        } 
        else if ($type === 'user' && $_SESSION['role'] === 'admin') {
            $stmt = $db->prepare("DELETE FROM staff WHERE id = :id AND id != :myid");
            $stmt->bindParam(':myid', $_SESSION['staff_id']);
        } 
        else { die("Forbidden"); }

        $stmt->bindParam(':id', $id);
        
        if($stmt->execute()) { echo "success"; }
    } catch(PDOException $e) { echo "error"; }
}
?>