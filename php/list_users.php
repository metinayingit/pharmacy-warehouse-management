<?php
require_once 'db.php';
@session_start();

try {
    $db = (new Database())->getConnection();
    $stmt = $db->prepare("SELECT * FROM staff");
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $s1 = $row['role'] == 'admin' ? 'selected' : '';
        $s2 = $row['role'] == 'pharmacist' ? 'selected' : '';
        $s3 = $row['role'] == 'technician' ? 'selected' : '';

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td><strong>" . $row["username"] . "</strong></td>
                <td>********</td>
                <td>
                    <select class='inline-edit' style='font-weight:bold; color:#3730a3;' onchange='updateUserRole(".$row['id'].", this.value)'>
                        <option value='admin' $s1>ADMIN</option>
                        <option value='pharmacist' $s2>PHARMACIST</option>
                        <option value='technician' $s3>TECHNICIAN</option>
                    </select>
                </td>
                <td><button onclick='deleteItem(".$row['id'].", \"user\", \"".$row['username']."\")' class='btn-mini-delete'>Delete</button></td>
              </tr>";
    }
} catch(PDOException $e) { echo "Error"; }
?>