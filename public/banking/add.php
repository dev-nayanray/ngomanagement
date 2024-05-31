<?php
require_once('../../controllers/BankingController.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $account_number = $_POST['account_number'];
    $bankingController = new BankingController();
    $bankingController->addBank($name, $branch, $account_number);
    header("Location: list.php");
}
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Add New Bank</h1>
    <form method="POST" action="add.php">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Branch</label>
            <input type="text" name="branch" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Account Number</label>
            <input type="text" name="account_number" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Bank</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
