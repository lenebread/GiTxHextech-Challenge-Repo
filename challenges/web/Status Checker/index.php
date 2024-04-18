<!DOCTYPE html>
<html>
<head>
    <title>Status Checker</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            background-color: #fff;
        }
        .result {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Website Status Checker</h1><br>
        <form method="get">
            <label for="url">Enter URL:</label><br><br>
            <input type="text" id="url" name="url" size="50"><br><br>
            <input type="submit" value="Check HTTP Status">
        </form>
        <?php
        if (isset($_GET['url'])) {
            $output = shell_exec("curl -o /dev/null -s -w '%{http_code}' " . $_GET['url']);
            echo "<div class=\"result\">HTTP Status: $output</div>";
        }
        ?>
    </div>
</body>
</html>
