<?php
require_once('../../config/database.php');
require_once('../../includes/header.php');

// Fetch all DPS records
$dpsRecords = $conn->query("SELECT * FROM DPS");
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">DPS List</h1>
    <a href="add.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New DPS</a>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Member ID</th>
                <th class="px-4 py-2">Scheme</th>
                <th class="px-4 py-2">Start Date</th>
                <th class="px-4 py-2">Maturity Date</th>
                <th class="px-4 py-2">Amount</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $dpsRecords->fetch_assoc()): ?>
            <tr>
                <td class="border px-4 py-2"><?php echo $row['id']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['member_id']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['scheme']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['start_date']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['maturity_date']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['amount']; ?></td>
                <td class="border px-4 py-2">
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once('../../includes/footer.php'); ?>
