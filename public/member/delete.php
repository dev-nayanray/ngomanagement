<?php
require_once('../../controllers/MemberController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $memberController = new MemberController();
    $memberController->deleteMember($id);
    header("Location: list.php");
}

