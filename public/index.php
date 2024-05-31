<?php
require_once('../config/database.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch data for dashboard
$members_count = $conn->query("SELECT COUNT(*) FROM Members")->fetch_row()[0];
$loans_count = $conn->query("SELECT COUNT(*) FROM Loans")->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <title>NGO Management Dashboard</title>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-blue-500 text-white p-4 rounded">
            <h2 class="text-xl">Members</h2>
            <p><?php echo $members_count; ?></p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded">
            <h2 class="text-xl">Loans</h2>
            <p><?php echo $loans_count; ?></p>
        </div>
        <!-- Add more grid items for other table data -->
        <div class="bg-yellow-500 text-white p-4 rounded">
            <h2 class="text-xl">Directors</h2>
            <?php
                $directors_count = $conn->query("SELECT COUNT(*) FROM Directors")->fetch_row()[0];
            ?>
            <p><?php echo $directors_count; ?></p>
        </div>
        <div class="bg-purple-500 text-white p-4 rounded">
            <h2 class="text-xl">Banks</h2>
            <?php
                $banks_count = $conn->query("SELECT COUNT(*) FROM Banks")->fetch_row()[0];
            ?>
            <p><?php echo $banks_count; ?></p>
        </div>
        <!-- Add more grid items for other table data -->
    </div>
</div>
<!-- Overview Section -->
<section class="mb-8">
            <h2 class="text-lg font-semibold mb-4">Overview</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Dynamic metrics -->
                <div class="bg-white rounded-md p-4 shadow">
                    <h3 class="text-xl font-semibold">Total Members</h3>
                    <p class="text-gray-600">1000</p>
                </div>
                <div class="bg-white rounded-md p-4 shadow">
                    <h3 class="text-xl font-semibold">Total Loans</h3>
                    <p class="text-gray-600">20</p>
                </div>
                <div class="bg-white rounded-md p-4 shadow">
                    <h3 class="text-xl font-semibold">Total Savings</h3>
                    <p class="text-gray-600">$100,000</p>
                </div>
            </div>
        </section>

        <!-- Recent Activities Section -->
        <section>
            <h2 class="text-lg font-semibold mb-4">Recent Activities</h2>
            <div class="bg-white rounded-md p-4 shadow">
                <!-- Dynamic recent activities -->
                <ul class="list-disc list-inside">
                    <li>Added new director - John Doe</li>
                    <li>Received loan payment from XYZ member</li>
                    <li>Generated monthly financial report</li>
                </ul>
            </div>
        </section>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
