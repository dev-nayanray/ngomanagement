<?php
require_once('../config/database.php');

class FDRController {
    public function addFDR($member_id, $scheme, $start_date, $maturity_date, $amount) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO FDR (member_id, scheme, start_date, maturity_date, amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssd", $member_id, $scheme, $start_date, $maturity_date, $amount);
        $stmt->execute();
        $stmt->close();
    }

    public function updateFDR($id, $member_id, $scheme, $start_date, $maturity_date, $amount) {
        global $conn;
        $stmt = $conn->prepare("UPDATE FDR SET member_id = ?, scheme = ?, start_date = ?, maturity_date = ?, amount = ? WHERE id = ?");
        $stmt->bind_param("isssdi", $member_id, $scheme, $start_date, $maturity_date, $amount, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteFDR($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM FDR WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

