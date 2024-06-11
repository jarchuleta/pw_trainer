<?php
// Check if file exists
if (!file_exists('hash.txt')) {
    echo "Error: hash.txt file not found.\n";
    exit(1);
}

// Read the first line from hash.txt
$hash = trim(file('hash.txt')[0]);

// Check if input is provided
if ($argc < 2) {
    // Prompt for input
    echo "Enter input to compare: ";
    $input = trim(fgets(STDIN));
} else {
    // Get input from command line argument
    $input = $argv[1];
}

// Get input from command line argument
$input = $argv[1];

// Compare input with hash
if (password_verify($input, $hash)) {
    echo "Input matches the hash.\n";
} else {
    echo "Input does not match the hash.\n";
}
?>