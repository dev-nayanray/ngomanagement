<?php
require_once('../../controllers/SMSController.php');
require_once('../../config/database.php');
require_once('../../includes/header.php');

$smsController = new SMSController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $template_name = $_POST['template_name'];
    $content = $_POST['content'];
    $smsController->updateSMSTemplate($id, $template_name, $content);
    header("Location: list.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM SMS WHERE id = $id");
$smsTemplate = $result->fetch_assoc();
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Edit SMS Template</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $smsTemplate['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700">Template Name</label>
            <input type="text" name="template_name" class="w-full p-2 border border-gray-300 rounded" value="<?php echo $smsTemplate['template_name']; ?>" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" class="w-full p-2 border border-gray-300 rounded" required><?php echo $smsTemplate['content']; ?></textarea>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Template</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
