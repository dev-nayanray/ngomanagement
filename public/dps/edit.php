<?php
require_once('../../controllers/DPSController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$dpsController = new DPSController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $member_id = $_POST['member_id'];
    $scheme = $_POST['scheme'];
    $start_date = $_POST['start_date'];
    $maturity_date = $_POST['maturity_date'];
    $amount = $_POST['amount'];
    $dpsController->updateDPS($id, $member_id, $scheme, $start_date, $maturity_date, $amount);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM DPS WHERE id = $id");
$dps = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit DPS</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $dps['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Member ID</label>
            <input type="text" name="member_id" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dps['member_id']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Scheme</label>
            <input type="text" name="scheme" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dps['scheme']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Start Date</label>
            <input type="date" name="start_date" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dps['start_date']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Maturity Date</label>
            <input type="date" name="maturity_date" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dps['maturity_date']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="text" name="amount" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $dps['amount']; ?>" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update DPS</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
