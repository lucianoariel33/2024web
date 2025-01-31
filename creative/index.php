<?php
// Obtener lista de archivos en la carpeta actual
$files = array_diff(scandir('.'), array('..', '.'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de Archivos con Arte Generativo</title>
    <style>
        body {
            margin: 0;
            font-family: 'Courier New', Courier, monospace; /* Fuente estilo retro */
            overflow: hidden;
            background-color: #000; /* Fondo negro para el estilo retro */
            color: #00ff00; /* Color de texto verde para el estilo retro */
        }
        #backgroundCanvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
        #content {
            position: absolute;
            top: 10%;
            left: 10%;
            right: 10%;
            bottom: 10%;
            z-index: 1;
            padding: 20px;
            border: 2px solid #00ff00; /* Borde verde estilo retro */
            background-color: #000; /* Fondo negro dentro del contenedor */
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5); /* Sombra verde */
        }
        h1, h2 {
            margin: 0;
            padding: 0;
            color: #00ff00; /* Color verde estilo retro */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
        a {
            color: #00ff00; /* Color verde estilo retro */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Lienzo para el arte generativo -->
    <canvas id="backgroundCanvas"></canvas>
    
    <!-- Contenido del explorador de archivos -->
    <div id="content">
        <h1>Programación creativa - Ejemplos</h1>
        <h3>Programación creativa - Ejemplos</h3>
        <ul>
            <?php foreach ($files as $file): ?>
                <li><a href="<?php echo htmlspecialchars($file); ?>" target = "_blank"><?php echo htmlspecialchars($file); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- JavaScript para el lienzo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js"></script>
    <script>
        const canvas = document.getElementById('backgroundCanvas');
        const ctx = canvas.getContext('2d');
        const simplex = new SimplexNoise();

        let minFrequency = 0.5;
        let maxFrequency = 2;
        let minAmplitude = 0.05;
        let maxAmplitude = 0.5;

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        function drawNoiseLine(v, start, end, amplitude, frequency, time, steps) {
            ctx.beginPath();
            for (let i = 0; i < steps; i++) {
                const t = steps <= 1 ? 0.5 : i / (steps - 1);
                const x = lerp(start[0], end[0], t);
                let y = lerp(start[1], end[1], t);
                y += simplex.noise3D(t * frequency + time, v * frequency, time) * amplitude;
                ctx.lineTo(x, y);
            }
            ctx.stroke();
        }

        function lerp(start, end, t) {
            return start + t * (end - start);
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            const frequency = lerp(minFrequency, maxFrequency, mouseX / canvas.width);
            const amplitude = lerp(minAmplitude, maxAmplitude, mouseY / canvas.height);

            const time = Date.now() / 6000;
            const rows = 10;

            ctx.strokeStyle = 'rgba(0, 255, 0, 0.7)'; /* Color verde estilo retro */
            ctx.lineWidth = Math.min(canvas.width, canvas.height) * 0.0025;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';

            for (let y = 0; y < rows; y++) {
                const v = rows <= 1 ? 0.5 : y / (rows - 1);
                const py = v * canvas.height;
                drawNoiseLine(v, [0, py], [canvas.width, py], amplitude * canvas.height, frequency, time * 0.5, 150);
            }
        }

        function animate() {
            draw();
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', resizeCanvas);
        window.addEventListener('mousemove', (event) => {
            mouseX = event.clientX;
            mouseY = event.clientY;
        });

        let mouseX = canvas.width / 2;
        let mouseY = canvas.height / 2;

        resizeCanvas();
        animate();
    </script>
</body>
</html>
