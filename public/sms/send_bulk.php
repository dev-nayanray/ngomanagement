<?php
require_once('../../config/database.php');
require_once('../../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $recipients = $_POST['recipients']; // Array of recipient IDs

    foreach ($recipients as $recipient) {
        // Fetch recipient's contact info
        $result = $conn->query("SELECT contact_info FROM Members WHERE id = $recipient");
        $member = $result->fetch_assoc();

        // Send SMS (this is just a placeholder, replace with actual SMS API call)
        $phone_number = $member['contact_info'];
        sendSMS($phone_number, $message);
    }

    echo "SMS sent successfully!";
}

function sendSMS($phone_number, $message) {
    // Placeholder function to send SMS
    // Integrate with actual SMS API here
}

$members = $conn->query("SELECT * FROM Members");
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Send Bulk SMS</h1>
    <form method="POST" action="send_bulk.php">
        <div class="mb-4">
            <label class="block text-gray-700">Message</label>
            <textarea name="message" class="w-full p-2 border border-gray-300 rounded" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Recipients</label>
            <select name="recipients[]" class="w-full p-2 border border-gray-300 rounded" multiple required>
                <?php while ($row = $members->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> (<?php echo $row['contact_info']; ?>)</option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send SMS</button>
    </form>
</div>

<?php require_once('../../includes/footer.php'); ?>
