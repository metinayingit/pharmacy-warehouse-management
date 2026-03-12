<?php
require_once 'db.php';
session_start();

if(isset($_POST['add_item'])) {
    $name = $_POST['name'];
    $serial = $_POST['serial_number'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $expiry = $_POST['expiry_date'];
    $desc = $_POST['description'];
    $image = $_FILES['file']['name'];
    $target = "../img/" . basename($image);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);

    try {
        $db = (new Database())->getConnection();
        $query = "INSERT INTO medicines (image, name, serial_number, stock, price, expiry_date, description) 
                  VALUES (:image, :name, :serial, :stock, :price, :expiry, :desc)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':image' => $image, ':name' => $name, ':serial' => $serial, 
            ':stock' => $stock, ':price' => $price, ':expiry' => $expiry, ':desc' => $desc
        ]);
        header("Location: ../index.php#stock_management");
    } catch(PDOException $e) { echo "Hata: " . $e->getMessage(); }
}
?>