<?php
require_once('../../config/database.php');
require_once('../../includes/header.php');

// Fetch all directors
$directors = $conn->query("SELECT * FROM Directors");
?>

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Directors List</h1>
    <a href="add.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Director</a>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Contact Info</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $directors->fetch_assoc()): ?>
            <tr>
                <td class="border px-4 py-2"><?php echo $row['id']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['name']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['contact_info']; ?></td>
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
