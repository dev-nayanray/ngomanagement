<?php
require_once('../config/database.php');

class SMSController {
    public function addSMSTemplate($template_name, $content) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO SMS (template_name, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $template_name, $content);
        $stmt->execute();
        $stmt->close();
    }

    public function updateSMSTemplate($id, $template_name, $content) {
        global $conn;
        $stmt = $conn->prepare("UPDATE SMS SET template_name = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $template_name, $content, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteSMSTemplate($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM SMS WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
