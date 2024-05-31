<?php
require_once('../config/database.php');

class SavingsController {
    public function addSavings($member_id, $amount, $date) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Savings (member_id, amount, date) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $member_id, $amount, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function updateSavings($id, $member_id, $amount, $date) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Savings SET member_id = ?, amount = ?, date = ? WHERE id = ?");
        $stmt->bind_param("idsi", $member_id, $amount, $date, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteSavings($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Savings WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
    