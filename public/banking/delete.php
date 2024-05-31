<?php
require_once('../../controllers/BankingController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bankingController = new BankingController();
    $bankingController->deleteBank($id);
    header("Location: list.php");
}
?>
