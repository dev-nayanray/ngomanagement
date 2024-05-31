<?php
require_once('../../controllers/MemberController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$memberController = new MemberController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $address = $_POST['address'];
    $memberController->updateMember($id, $name, $contact_info, $address);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Members WHERE id = $id");
$member = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit Member</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $member['name']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Contact Info</label>
            <input type="text" name="contact_info" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $member['contact_info']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Address</label>
            <input type="text" name="address" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $member['address']; ?>" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Member</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
