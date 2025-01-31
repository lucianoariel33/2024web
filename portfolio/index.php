<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <style>
        /* Fuente monoespaciada para el look de terminal */
        body {
            background-color: #000;
            color: #00ff00;
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            padding: 20px;
        }

        h1 {
            color: #00ff00;
            border-bottom: 1px solid #00ff00;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            padding: 5px 0;
        }

        a {
            color: #00ff00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .directory {
            color: #ffffff;
        }

        /* Estilo para el texto "Volver?" */
        .back-link {
            font-size: 0.8em;
            margin-left: 10px;
            animation: flicker 2s infinite;
        }

        @keyframes flicker {
            0%, 18%, 22%, 25%, 53%, 57%, 100% {
                opacity: 1;
            }
            20%, 24%, 55% {
                opacity: 0;
            }
        }

        /* Estilo del efecto de cartel de aeropuerto */
        .airport-text {
            display: inline-block;
            font-size: 1.5em;
            letter-spacing: 0.2em;
        }

        .char {
            display: inline-block;
            transition: all 0.2s ease-in-out;
        }

        /* Estilos para el pie de página */
        footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 14px;
            color: #00ff00;
            font-family: 'Courier New', Courier, monospace;
        }

        .moving-text {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <h1 id="title" class="airport-text"></h1>
    <span class="back-link"><a href="https://lucianoariel.com.ar/">Volver?</a></span>

    <?php
    $dir = "."; // Utiliza el directorio actual donde está index.php
    $files = scandir($dir);

    echo "<ul>";
    foreach($files as $file) {
        if($file !== '.' && $file !== '..' && $file !== 'index.php') {
            // Verifica si es un directorio o un archivo
            if(is_dir($file)) {
                echo "<li class='directory'>[DIR] <a href='$file/'>$file</a></li>";
            } else {
                echo "<li>[FILE] <a href='$file'>$file</a></li>";
            }
        }
    }
    echo "</ul>";
    ?>

    <!-- Pie de página con texto animado -->
    <footer>
        <span class="moving-text" id="movingText">Mostrando contenido...</span>
    </footer>

    <script>
        // JavaScript para crear el efecto de texto en movimiento
        const textElement = document.getElementById('movingText');
        const originalText = textElement.textContent;

        function scrambleText(text) {
            return text.split('').sort(() => Math.random() - 0.5).join('');
        }

        function animateText() {
            let iterations = 0;
            const interval = setInterval(() => {
                if (iterations < 10) {
                    textElement.textContent = scrambleText(originalText);
                } else {
                    textElement.textContent = originalText;
                    clearInterval(interval);
                }
                iterations++;
            }, 75); // Velocidad de la animación
        }

        setInterval(animateText, 2000); // Intervalo para repetir la animación

        // Texto tipo cartel de aeropuerto
        const titleText = "Portfolio";
        const titleElement = document.getElementById("title");

        function createAirportEffect(text, element) {
            const chars = text.split('');
            element.innerHTML = chars.map(char => `<span class="char">${char}</span>`).join('');

            const charElements = element.querySelectorAll('.char');

            let intervalIndex = 0;

            function updateChars() {
                charElements.forEach((charElement, index) => {
                    setTimeout(() => {
                        charElement.textContent = chars[Math.floor(Math.random() * chars.length)];
                    }, index * 50);
                });

                if (intervalIndex < 10) {
                    intervalIndex++;
                } else {
                    clearInterval(interval);
                    charElements.forEach((charElement, index) => {
                        setTimeout(() => {
                            charElement.textContent = chars[index];
                        }, index * 50);
                    });
                }
            }

            const interval = setInterval(updateChars, 100);
        }

        createAirportEffect(titleText, titleElement);
        setInterval(() => createAirportEffect(titleText, titleElement), 4000);
    </script>
</body>
</html>