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
        <!-- 1 -->
        <div class="tableMultiplication">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<div class='multiplicationTable'>";
                for ($j = 1; $j <= 10; $j++) {
                    $result = $i * $j;
                    echo "<span class='multiplication'>{$i} x {$j} = {$result}";
                }
                echo "</div>";
            }
            ?>
        </div>
    </body>

    </html>