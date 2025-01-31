<?php
// Obtener todos los archivos en el directorio actual
$files = array_diff(scandir(__DIR__), array('index.php', '.', '..'));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de ejemplos Js</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #c0c0c0;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 600px;
            margin: 50px auto;
            border: 2px solid #000080;
            background-color: #f0f0f0;
            padding: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            border-radius: 5px;
        }
        h1 {
            font-size: 20px;
            background-color: #000080;
            color: #fff;
            padding: 5px;
            margin: 0;
            text-align: center;
            border-radius: 3px;
        }
        .file-list {
            list-style-type: none;
            padding: 0;
        }
        .file-list li {
            border: 1px solid #000080;
            margin-bottom: 5px;
            padding: 5px;
            background-color: #ffffff;
            border-radius: 3px;
            box-shadow: inset 1px 1px 3px rgba(0,0,0,0.2);
        }
        .file-list a {
            color: #000080;
            text-decoration: none;
            font-weight: bold;
        }
        .file-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ejemplos de uso Javascript</h1>
<h3>Si algún link no funciona, no es de Js</h3>
        <ul class="file-list">
            <?php foreach ($files as $file): ?>
                <li><a href="<?php echo htmlspecialchars($file); ?>"><?php echo htmlspecialchars($file); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
