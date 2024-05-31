<?php
require_once('../../controllers/BankingController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$bankingController = new BankingController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $account_number = $_POST['account_number'];
    $bankingController->updateBank($id, $name, $branch, $account_number);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Banks WHERE id = $id");
$bank = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit Bank</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $bank['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $bank['name']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Branch</label>
            <input type="text" name="branch" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $bank['branch']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Account Number</label>
            <input type="text" name="account_number" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $bank['account_number']; ?>" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Bank</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
