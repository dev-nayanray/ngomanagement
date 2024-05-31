<?php
require_once('../../controllers/CollectionController.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $collectionController = new CollectionController();
    $collectionController->deleteCollection($id);
    header("Location: list.php");
}
?>
