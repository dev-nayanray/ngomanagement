<?php
require_once('../../controllers/DPSController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dpsController = new DPSController();
    $dpsController->deleteDPS($id);
    header("Location: list.php");
}
