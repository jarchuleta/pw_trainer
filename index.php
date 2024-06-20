<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>response Check</title>
</head>
<body>
    <?php
    $responseCorrect = "secureresponse123"; // Define your correct response here
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $response = $_POST['response'];

        // Read the first line from hash.txt
        $hash = trim(file('hash.txt')[0]);

        if (password_verify($response, $hash)) {
            echo "<h1>Access Granted</h1>";
        } else {
            $error = "Invalid response. Please try again.";
        }
    }
    ?>

    <?php if (empty($response) || $error): ?>
        <h1>Please Enter Your response</h1>
        <form method="post" action="">
            <label for="response">response:</label>
            <input type="response" id="response" name="response" required>
            <button type="submit">Submit</button>
        </form>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

