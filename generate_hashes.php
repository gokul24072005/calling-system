<?php
// generate_hashes.php
echo "admin123 hash: " . password_hash('admin123', PASSWORD_DEFAULT) . "<br>";
echo "1234 hash: " . password_hash('1234', PASSWORD_DEFAULT) . "<br>";
?>