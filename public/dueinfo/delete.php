<?php
require_once('../../controllers/DueInfoController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dueInfoController = new DueInfoController();
    $dueInfoController->deleteDueInfo($id);
    header("Location: list.php");
}

