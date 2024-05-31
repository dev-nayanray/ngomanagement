<?php
require_once('../../controllers/LoanController.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $amount = $_POST['amount'];
    $status = 'pending'; // Default status for a new loan
     
    $loanController = new LoanController();
    $loanController->addLoan($member_id, $amount, $status);
    header("Location: list.php");
}
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Add New Loan</h1>
    <form method="POST" action="add.php">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Loan</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
