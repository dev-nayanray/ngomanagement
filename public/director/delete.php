<?php
require_once('../../controllers/DirectorController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $directorController = new DirectorController();
    $directorController->deleteDirector($id);
    header("Location: list.php");
}

