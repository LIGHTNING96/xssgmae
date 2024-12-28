<!DOCTYPE html>
<html>
<head>
    <title>Basic XSS Challenge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #555;
        }
        form {
            margin: 20px auto;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Basic XSS Challenge</h1>
    <form method="GET">
        <label for="input">Enter something:</label>
        <input type="text" id="input" name="input" placeholder="Type here...">
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_GET['input'])) {
        $input = $_GET['input'];
        $sanitizedInput = htmlspecialchars($input, ENT_QUOTES, 'UTF-8'); // Prevents direct script execution
        echo "<p>Your input: <span>$sanitizedInput</span></p>";

        // Check if input contains alert() function
        if (preg_match('/alert\\((.*?)\\)/i', $input)) {
            $flag = '{flag1}'; // Replace with your actual flag
            echo "<script>alert('$flag');</script>";
        }
    }
    ?>
</body>
</html>
