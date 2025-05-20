        <!-- 6 -->
        <?php
        function calculate()
        {
            $result = '';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numberOneValue = isset($_POST['numberOne']) ? floatval($_POST['numberOne']) : 0;
                $operatorValue = isset($_POST['operator']) ? $_POST['operator'] : '';
                $numberTwoValue = isset($_POST['numberTwo']) ? floatval($_POST['numberTwo']) : 0;

                switch ($operatorValue) {
                    case '+':
                        $result = $numberOneValue + $numberTwoValue;
                        break;
                    case '-':
                        $result = $numberOneValue - $numberTwoValue;
                        break;
                    case '*':
                        $result = $numberOneValue * $numberTwoValue;
                        break;
                    case '/':
                        if ($numberTwoValue != 0) {
                            $result = $numberOneValue / $numberTwoValue;
                        } else {
                            $result = "Lỗi: Không thể chia cho 0";
                        }
                        break;
                    case '^':
                        $result = pow($numberOneValue, $numberTwoValue);
                        break;
                    default:
                        // $result = "Chọn một phép toán";
                        break;
                }
            }
            return $result;
        }

        $calculationResult = calculate();
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
            <!-- 6 -->
            <form method="POST" action="">
                <input type="number" name="numberOne" id="numberOne" value="0" required>
                <button type="submit" class="buttonPlus" name="operator" value="+">+</button>
                <button type="submit" class="buttonSub" name="operator" value="-">-</button>
                <button type="submit" class="buttonMul" name="operator" value="x">x</button>
                <button type="submit" class="buttonDiv" name="operator" value="/">/</button>
                <button type="submit" class="buttonExpon" name="operator" value="^">^</button>
                <input type="number" name="numberTwo" id="numberTwo" value="0" required>
                <label>=</label>
                <input type="text" name="result" value="<?php echo htmlspecialchars($calculationResult); ?>" readonly />
            </form>
        </body>

        </html>