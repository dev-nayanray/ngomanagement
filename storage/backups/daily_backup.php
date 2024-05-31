<?php
$host = 'localhost';
$db = 'ngo_management';
$user = 'root';
$pass = '';

// Create backup file name
$backup_file = '../storage/backups/' . $db . '_' . date('Y-m-d_H-i-s') . '.sql';

// Command to execute
$command = "mysqldump --opt -h $host -u $user -p$pass $db > $backup_file";

// Execute the command
system($command, $output);

// Check if backup was successful
if ($output == 0) {
    echo "Backup successful!";
} else {
    echo "Backup failed!";
}
?>
