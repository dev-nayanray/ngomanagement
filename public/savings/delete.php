<?php
require_once('../../controllers/SavingsController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $savingsController = new SavingsController();
    $savingsController->deleteSavings($id);
    header("Location: list.php");
}
?>
