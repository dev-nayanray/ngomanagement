<?php
require_once('../../controllers/LoanController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$loanController = new LoanController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $member_id = $_POST['member_id'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $loanController->updateLoan($id, $member_id, $amount, $status);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Loans WHERE id = $id");
$loan = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit Loan</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $loan['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $loan['member_id']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $loan['amount']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="w-full p-2 border border-gray-300 rounded" required>
                <option value="pending" <?php echo ($loan['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="approved" <?php echo ($loan['status'] == 'approved') ? 'selected' : ''; ?>>Approved</option>
                <option value="rejected" <?php echo ($loan['status'] == 'rejected') ? 'selected' : ''; ?>>Rejected</option>
            </select>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Loan</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
