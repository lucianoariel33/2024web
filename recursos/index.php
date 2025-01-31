<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos</title>
    <style>
        /* Estilo general */
        body {
            background-color: #c0c0c0;
            color: #000000;
            font-family: 'MS Sans Serif', Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 10px;
        }

        h1 {
            background-color: #000080;
            color: #ffffff;
            padding: 5px;
            margin: 0;
            font-size: 16px;
        }

        .window {
            background-color: #ffffff;
            border: 2px solid #000080;
            box-shadow: 4px 4px #808080;
            padding: 10px;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            padding: 5px 0;
            display: flex;
            align-items: center;
        }

        a {
            color: #000080;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .directory {
            font-weight: bold;
        }

        /* Iconos para archivos y carpetas */
        .icon {
            width: 16px;
            height: 16px;
            margin-right: 10px;
        }

        /* Estilo del pie de página */
        footer {
            background-color: #c0c0c0;
            color: #000000;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-top: 1px solid #808080;
        }
    </style>
</head>
<body>
    <h1>Explorador de Archivos</h1>
    <div class="window">
        <?php
        $dir = "."; // Utiliza el directorio actual donde está index.php
        $files = scandir($dir);

        echo "<ul>";
        foreach($files as $file) {
            if($file !== '.' && $file !== '..' && $file !== 'index.php') {
                // Verifica si es un directorio o un archivo
                if(is_dir($file)) {
                    echo "<li class='directory'><img src='https://via.placeholder.com/16/000080/FFFFFF?text=D' alt='folder' class='icon'> <a href='$file/'>$file</a></li>";
                } else {
                    echo "<li><img src='https://via.placeholder.com/16/000080/FFFFFF?text=F' alt='file' class='icon'> <a href='$file'>$file</a></li>";
                }
            }
        }
        echo "</ul>";
        ?>

    </div>
    <footer>
        <?php
        // Obtener la fecha actual
        $currentDate = date('d-m');
        if ($currentDate == '26-06') {
            echo 'El dia de tu aniBersario';
        } else {
            echo 'Luciano Ariel - ' . date('d M Y');
        }
        ?>
    </footer>
</body>
</html>