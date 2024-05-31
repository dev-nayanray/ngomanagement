<?php
require_once('../config/database.php');

class InvestmentController {
    public function addInvestment($member_id, $amount, $date) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Investments (member_id, amount, date) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $member_id, $amount, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function updateInvestment($id, $member_id, $amount, $date) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Investments SET member_id = ?, amount = ?, date = ? WHERE id = ?");
        $stmt->bind_param("idsi", $member_id, $amount, $date, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteInvestment($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Investments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
