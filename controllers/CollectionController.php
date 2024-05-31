<?php
require_once('../config/database.php');

class CollectionController {
    public function addCollection($member_id, $amount, $date) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Collections (member_id, amount, date) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $member_id, $amount, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function updateCollection($id, $member_id, $amount, $date) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Collections SET member_id = ?, amount = ?, date = ? WHERE id = ?");
        $stmt->bind_param("idsi", $member_id, $amount, $date, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteCollection($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Collections WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
