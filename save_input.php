<?php
// Check if input is provided
if ($argc < 2) {
    echo "Usage: php save_input.php <input>\n";
    exit(1);
}

// Get input from command line argument
$input = $argv[1];

// Validate input (optional)
// You can add more validation as needed

// Open file for writing
$file = fopen("hash.txt", "w");

$hashed = password_hash($input, PASSWORD_DEFAULT);

if ($file) {
    // Write input to file
    fwrite($file, $hashed);
    fclose($file);
    echo "Input saved successfully.\n";
} else {
    echo "Unable to open file for writing.\n";
}
?>