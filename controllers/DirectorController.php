<?php
require_once('../config/database.php');

class DirectorController {
    public function addDirector($name, $contact_info) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Directors (name, contact_info) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $contact_info);
        $stmt->execute();
        $stmt->close();
    }

    public function updateDirector($id, $name, $contact_info) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Directors SET name = ?, contact_info = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $contact_info, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteDirector($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Directors WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
