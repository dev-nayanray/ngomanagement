<?php
require_once('../../controllers/DueInfoController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$dueInfoController = new DueInfoController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $member_id = $_POST['member_id'];
    $due_amount = $_POST['due_amount'];
    $due_date = $_POST['due_date'];
    $dueInfoController->updateDueInfo($id, $member_id, $due_amount, $due_date);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM DueInfo WHERE id = $id");
$dueInfo = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit Due Info</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $dueInfo['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dueInfo['member_id']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Due Amount</label>
            <input type="text" name="due_amount" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dueInfo['due_amount']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Due Date</label>
            <input type="date" name="due_date" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dueInfo['due_date']; ?>" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Due Info</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
