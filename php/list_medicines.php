<?php
require_once 'db.php';
@session_start();
$userRole = $_SESSION['role'] ?? 'guest'; 

try {
    $db = (new Database())->getConnection();
    $stmt = $db->prepare("SELECT * FROM medicines ORDER BY id DESC");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $isTech = ($userRole === 'technician');
        $readonly = $isTech ? "readonly style='color:#9ca3af; cursor:not-allowed;'" : "";
        
        $formattedPrice = number_format($row['price'], 2, '.', ''); 
        $formattedStock = (int)$row['stock']; 

        $stockStyle = ($formattedStock <= 10) ? "color: #dc2626 !important; font-weight: bolder;" : "color: #17993e !important; font-weight: bolder;";

        $stockInput = "<input type='number' class='inline-edit' style='$stockStyle' value='" . $formattedStock . "' onchange='updateField(" . $row['id'] . ", \"stock\", this.value); this.value = parseInt(this.value);'>";
        
        $priceInput = "<input type='number' step='0.01' class='inline-edit' value='" . $formattedPrice . "' onchange='updateField(" . $row['id'] . ", \"price\", this.value); this.value = parseFloat(this.value).toFixed(2);' $readonly>";
        
        echo "<tr>
            <td><img height='45' src='img/" . $row['image'] . "'></td>
            <td><input type='text' class='inline-edit' value='" . $row['name'] . "' onchange='updateField(" . $row['id'] . ", \"name\", this.value)' $readonly></td>
            <td><input type='text' class='inline-edit' value='" . $row['serial_number'] . "' onchange='updateField(" . $row['id'] . ", \"serial_number\", this.value)' $readonly></td>
            <td>$stockInput</td>
            <td>$priceInput</td>
            <td><input type='date' class='inline-edit' value='" . $row['expiry_date'] . "' onchange='updateField(" . $row['id'] . ", \"expiry_date\", this.value)' $readonly></td>
            <td><input type='text' class='inline-edit' value='" . $row['description'] . "' onchange='updateField(" . $row['id'] . ", \"description\", this.value)' $readonly></td>
            <td>";
        
        if (!$isTech) { 
            echo "<button onclick='deleteItem(" . $row['id'] . ", \"medicine\", \"" . $row['serial_number'] . "\")' class='btn-mini-delete'>Delete</button>";
        } else {
            echo "<span style='color:#9ca3af; font-size:12px; font-weight:bold;'>No Access</span>";
        }
        
        echo "</td></tr>";
    }
} catch (PDOException $e) { echo "Error"; }
?>