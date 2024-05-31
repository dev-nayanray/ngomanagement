<?php
require_once('../../controllers/SMSController.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $template_name = $_POST['template_name'];
    $content = $_POST['content'];
    $smsController = new SMSController();
    $smsController->addSMSTemplate($template_name, $content);
    header("Location: list.php");
}
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Add New SMS Template</h1>
    <form method="POST" action="add.php">
        <div class="mb-4">
            <label class="block text-gray-700">Template Name</label>
            <input type="text" name="template_name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" class="w-full p-2 border border-gray-300 rounded" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Template</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
