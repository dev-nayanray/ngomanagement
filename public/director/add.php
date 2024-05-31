<?php
require_once('../../controllers/DirectorController.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $directorController = new DirectorController();
    $directorController->addDirector($name, $contact_info);
    header("Location: list.php");
}
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Add New Director</h1>
    <form method="POST" action="add.php">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Contact Info</label>
            <input type="text" name="contact_info" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Director</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
