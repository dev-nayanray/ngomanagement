<?php
require_once('../../controllers/DueInfoController.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $due_amount = $_POST['due_amount'];
    $due_date = $_POST['due_date'];
    $dueInfoController = new DueInfoController();
    $dueInfoController->addDueInfo($member_id, $due_amount, $due_date);
    header("Location: list.php");
}
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Add New Due Info</h1>
    <form method="POST" action="add.php">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Due Amount</label>
            <input type="text" name="due_amount" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Due Date</label>
            <input type="date" name="due_date" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Due Info</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
