<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>response Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
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

