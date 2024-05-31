<?php
require_once('../../controllers/InvestmentController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$investmentController = new InvestmentController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $member_id = $_POST['member_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $investmentController->updateInvestment($id, $member_id, $amount, $date);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Investments WHERE id = $id");
$investment = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit Investment</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $investment['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $investment['member_id']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $investment['amount']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Date</label>
            <input type="date" name="date" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $investment['date']; ?>" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Investment</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
