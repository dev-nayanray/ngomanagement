<?php
require_once('../../controllers/LoanController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $loanController = new LoanController();
    $loanController->deleteLoan($id);
    header("Location: list.php");
}

