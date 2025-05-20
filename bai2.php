    <?php
    function drawChart()
    {
        $anhValue = isset($_POST['anh']) ? intval($_POST['anh']) : 0;
        $phapValue = isset($_POST['phap']) ? intval($_POST['phap']) : 0;
        $ducValue = isset($_POST['duc']) ? intval($_POST['duc']) : 0;
        $ngaValue = isset($_POST['nga']) ? intval($_POST['nga']) : 0;
        $nhatValue = isset($_POST['nhat']) ? intval($_POST['nhat']) : 0;

        $dataArray = [
            ['label' => 'Anh', 'value' => $anhValue],
            ['label' => 'Pháp', 'value' => $phapValue],
            ['label' => 'Đức', 'value' => $ducValue],
            ['label' => 'Nga', 'value' => $ngaValue],
            ['label' => 'Nhật', 'value' => $nhatValue]
        ];
        //array_column($dataArray, 'value'): Trích xuất một mảng mới chỉ chứa các giá trị của khóa 'value'.
        //array_sum(...): Tính tổng tất cả các giá trị trong mảng được trả về bởi array_column().
        $totalValue = array_sum(array_column($dataArray, 'value'));
        // foreach ($dataArray as $item) {
        //     echo "<div>";
        //     echo "<span style='display: inline-block; width: 80px;'>" . $item['label'] . ":</span> "; 
        //     $percentage = ($totalValue > 0) ? ($item['value'] / $totalValue) * 100 : 0;
        //     echo "<span style='display: inline-block;'>" . number_format($percentage, 0) . "%</span>"; 
        //     echo "</div>";
        // }
        echo "<div style='display: table; width: 300px;'>";
        foreach ($dataArray as $item) {
            echo "<div style='display: table-row;'>";
            echo "<div style='display: table-cell;'>{$item['label']}</div>";
            echo "<div style='display: table-cell;'>";
            $percentage = ($totalValue > 0) ? ($item['value'] / $totalValue) * 100 : 0;
            echo "<div class='bar-inline' style='width: {$percentage}%; background-color: red; height: 20px; display: inline-block;'></div>";
            echo "<span class='percentage-label' style='margin-left: 5px;'>" . number_format($percentage, 0) . "%</span>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
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
        <!-- 2 -->
        <form method="POST" action="">
            Anh: <input type="number" name="anh" id="anh" value="0"><br>
            Pháp: <input type="number" name="phap" id="phap" value="0"><br>
            Đức: <input type="number" name="duc" id="duc" value="0"><br>
            Nga: <input type="number" name="nga" id="nga" value="0"><br>
            Nhật: <input type="number" name="nhat" id="nhat" value="0"><br>
            <button type="submit">Vẽ đồ thị</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            drawChart();
        }
        ?>
    </body>

    </html>