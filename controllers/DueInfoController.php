<?php
require_once('../config/database.php');

class DueInfoController {
    public function addDueInfo($member_id, $due_amount, $due_date) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO DueInfo (member_id, due_amount, due_date) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $member_id, $due_amount, $due_date);
        $stmt->execute();
        $stmt->close();
    }

    public function updateDueInfo($id, $member_id, $due_amount, $due_date) {
        global $conn;
        $stmt = $conn->prepare("UPDATE DueInfo SET member_id = ?, due_amount = ?, due_date = ? WHERE id = ?");
        $stmt->bind_param("idsi", $member_id, $due_amount, $due_date, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteDueInfo($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM DueInfo WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
