<?php
require_once('../config/database.php');

class LoanController {
    public function addLoan($member_id, $amount, $status) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Loans (member_id, amount, status) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $member_id, $amount, $status);
        $stmt->execute();
        $stmt->close();
    }

    public function updateLoan($id, $member_id, $amount, $status) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Loans SET member_id = ?, amount = ?, status = ? WHERE id = ?");
        $stmt->bind_param("idsi", $member_id, $amount, $status, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteLoan($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Loans WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
