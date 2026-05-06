<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>SNAKE 80s - LARAVEL RETRO</title>
    <style>
        body {
            background-color: #050505;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #39ff14;
            font-family: 'Courier New', Courier, monospace;
        }

        h1 {
            font-size: 2rem;
            text-shadow: 0 0 10px #39ff14;
            margin-bottom: 10px;
        }

        #game-box {
            border: 4px solid #39ff14;
            background: #000;
            line-height: 0;
        }

        canvas {
            display: block;
        }

        .stats {
            margin-top: 15px;
            text-align: center;
        }

        #msg {
            color: #fff;
            font-size: 0.9rem;
            margin-top: 5px;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <h1>SNAKE_SYSTEM_v1.1</h1>
    <div id="game-box">
        <canvas id="snakeGame" width="400" height="400"></canvas>
    </div>
    <div class="stats">
        <div>SCORE: <span id="scoreVal">0</span></div>
        <div id="msg">PRESSIONE UMA SETA PARA INICIAR</div>
    </div>

    <script>
        const canvas = document.getElementById("snakeGame");
        const ctx = canvas.getContext("2d");
        const scoreElement = document.getElementById("scoreVal");
        const msgElement = document.getElementById("msg");

        const box = 20;
        let score = 0;
        let d = null;
        let gameActive = true;

        // Cobra começa exatamente no meio do grid (400/2 = 200, ajustado para o grid de 20)
        let snake = [{
            x: 10 * box,
            y: 10 * box
        }];
        let food = {
            x: Math.floor(Math.random() * 19 + 1) * box,
            y: Math.floor(Math.random() * 19 + 1) * box
        };

        document.addEventListener("keydown", direction);

        function direction(event) {
            let key = event.keyCode;
            if (key == 37 && d != "RIGHT") d = "LEFT";
            else if (key == 38 && d != "DOWN") d = "UP";
            else if (key == 39 && d != "LEFT") d = "RIGHT";
            else if (key == 40 && d != "UP") d = "DOWN";

            if (d) msgElement.style.display = "none"; // Esconde a mensagem ao começar
        }

        function draw() {
            if (!gameActive) return;

            ctx.fillStyle = "black";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Desenhar Comida
            ctx.fillStyle = "#ff003c";
            ctx.fillRect(food.x, food.y, box, box);

            // Desenhar Cobra
            for (let i = 0; i < snake.length; i++) {
                ctx.fillStyle = (i == 0) ? "#39ff14" : "#1a7a0a";
                ctx.fillRect(snake[i].x, snake[i].y, box, box);
                ctx.strokeRect(snake[i].x, snake[i].y, box, box);
            }

            // Só movimenta se uma direção foi escolhida
            if (d) {
                let snakeX = snake[0].x;
                let snakeY = snake[0].y;

                if (d == "LEFT") snakeX -= box;
                if (d == "UP") snakeY -= box;
                if (d == "RIGHT") snakeX += box;
                if (d == "DOWN") snakeY += box;

                let newHead = {
                    x: snakeX,
                    y: snakeY
                };

                // Colisão com paredes ou corpo
                if (snakeX < 0 || snakeY < 0 || snakeX >= canvas.width || snakeY >= canvas.height || collision(newHead,
                        snake)) {
                    gameActive = false;
                    alert("GAME OVER! SCORE: " + score);
                    location.reload();
                    return;
                }

                if (snakeX == food.x && snakeY == food.y) {
                    score++;
                    scoreElement.innerHTML = score;
                    food = {
                        x: Math.floor(Math.random() * 19 + 1) * box,
                        y: Math.floor(Math.random() * 19 + 1) * box
                    };
                } else {
                    snake.pop();
                }

                snake.unshift(newHead);
            }
        }

        function collision(head, array) {
            for (let i = 0; i < array.length; i++) {
                if (head.x == array[i].x && head.y == array[i].y) return true;
            }
            return false;
        }

        let gameInterval = setInterval(draw, 100);
    </script>
</body>

</html>
