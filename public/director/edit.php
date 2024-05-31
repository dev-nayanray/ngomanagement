<?php
require_once('../../controllers/DirectorController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$directorController = new DirectorController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $directorController->updateDirector($id, $name, $contact_info);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Directors WHERE id = $id");
$director = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit Director</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $director['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $director['name']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Contact Info</label>
            <input type="text" name="contact_info" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $director['contact_info']; ?>" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Director</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
