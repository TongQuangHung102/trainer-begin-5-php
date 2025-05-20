        <!-- 4 -->
        <?php
        function drawTriangle()
        {
            $numberTriangle = isset($_POST['numberTriangle']) ? intval($_POST['numberTriangle']) : 0;
            if (is_nan($numberTriangle) || $numberTriangle < 0) {
                echo "<label>" . "Vui lòng nhập số nguyên dương hợp lệ" . "</label>";
                return;
            }
            $tamgiacHTML = '';
            for ($i = 1; $i <= $numberTriangle; $i++) {
                $hang = '';
                $currentNum = $i % 10;
                for ($j = 0; $j < $i; $j++) {
                    $hang .= $currentNum . ' ';
                    $currentNum--;
                    if ($currentNum < 0) {
                        $currentNum = 9;
                    }
                }
                $tamgiacHTML .= $hang . '<br>';
            }
            echo $tamgiacHTML;
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css/reset.css">
            <link rel="stylesheet" href="./css/main.css">
            <title>Document</title>
        </head>

        <body>
            <!-- 4 -->
            <form method="POST" action="">
                <input type="number" name="numberTriangle" id="numberTriangle" value="0">
                <button type="submit" class="buttonTriangle">Vẽ tam giác</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                drawTriangle();
            }
            ?>
        </body>

        </html>