<?php
require_once('../config/database.php');

class BankingController {
    public function addBank($name, $branch, $account_number) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Banks (name, branch, account_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $branch, $account_number);
        $stmt->execute();
        $stmt->close();
    }

    public function updateBank($id, $name, $branch, $account_number) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Banks SET name = ?, branch = ?, account_number = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $branch, $account_number, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteBank($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Banks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
