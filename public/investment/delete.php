<?php
require_once('../../controllers/InvestmentController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $investmentController = new InvestmentController();
    $investmentController->deleteInvestment($id);
    header("Location: list.php");
}

