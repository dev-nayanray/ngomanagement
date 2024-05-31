<?php
require_once('../../controllers/SMSController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $smsController = new SMSController();
    $smsController->deleteSMSTemplate($id);
    header("Location: list.php");
}
?>
