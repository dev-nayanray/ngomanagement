<?php
require_once('../config/database.php');

class DPSController {
    public function addDPS($member_id, $scheme, $start_date, $maturity_date, $amount) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO DPS (member_id, scheme, start_date, maturity_date, amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssd", $member_id, $scheme, $start_date, $maturity_date, $amount);
        $stmt->execute();
        $stmt->close();
    }

    public function updateDPS($id, $member_id, $scheme, $start_date, $maturity_date, $amount) {
        global $conn;
        $stmt = $conn->prepare("UPDATE DPS SET member_id = ?, scheme = ?, start_date = ?, maturity_date = ?, amount = ? WHERE id = ?");
        $stmt->bind_param("isssdi", $member_id, $scheme, $start_date, $maturity_date, $amount, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteDPS($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM DPS WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
