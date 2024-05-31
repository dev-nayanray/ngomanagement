<?php
require_once('../../controllers/FDRController.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $scheme = $_POST['scheme'];
    $start_date = $_POST['start_date'];
    $maturity_date = $_POST['maturity_date'];
    $amount = $_POST['amount'];
    $fdrController = new FDRController();
    $fdrController->addFDR($member_id, $scheme, $start_date, $maturity_date, $amount);
    header("Location: list.php");
}
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Add New FDR</h1>
    <form method="POST" action="add.php">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Scheme</label>
            <input type="text" name="scheme" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Start Date</label>
            <input type="date" name="start_date" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Maturity Date</label>
            <input type="date" name="maturity_date" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add FDR</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
