<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blockchain File Explorer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #00ffcc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #0d0d0d;
            border: 2px solid #00ffcc;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 0 15px rgba(0, 255, 204, 0.3);
        }
        h1 {
            text-align: center;
            color: #00ffcc;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #333;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        li:hover {
            background-color: #00ffcc;
            color: #0d0d0d;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Blockchain Test Proyects</h1>
    <ul>
        <?php
        $files = scandir(__DIR__);
        $currentFile = basename(__FILE__);

        foreach ($files as $file) {
            if ($file !== $currentFile && $file !== '.' && $file !== '..') {
                echo '<li><a href="' . $file . '">' . $file . '</a></li>';
            }
        }
        ?>
    </ul>
</div>

</body>
</html>
