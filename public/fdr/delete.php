<?php
require_once('../../controllers/FDRController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fdrController = new FDRController();
    $fdrController->deleteFDR($id);
    header("Location: list.php");
}

