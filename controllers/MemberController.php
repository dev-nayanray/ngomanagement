<?php
require_once('../config/database.php');

class MemberController {
    public function addMember($name, $contact_info, $address) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO Members (name, contact_info, address) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $contact_info, $address);
        $stmt->execute();
        $stmt->close();
    }

    public function updateMember($id, $name, $contact_info, $address) {
        global $conn;
        $stmt = $conn->prepare("UPDATE Members SET name = ?, contact_info = ?, address = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $contact_info, $address, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteMember($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM Members WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
