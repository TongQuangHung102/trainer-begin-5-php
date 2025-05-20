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
            <!-- 7 -->
            <div class="calendarContainer">
                <?php
                function generateCalendar($year, $month, $highlightDay)
                {
                    $daysInWeek = ['Su', 'M', 'Tu', 'W', 'Th', 'F', 'Sa'];
                    $firstDay = new DateTime("$year-$month-01");
                    $startDay = $firstDay->format('w'); // 0 (Sun) - 6 (Sat)
                    $daysInMonth = $firstDay->format('t');

                    $table = '<table class="calendar">';
                    $table .= '<caption>' . strtoupper($firstDay->format('F')) . ' ' . $year . '</caption>';
                    $table .= '<tr>';
                    foreach ($daysInWeek as $d) {
                        $table .= '<th>' . $d . '</th>';
                    }
                    $table .= '</tr><tr>';


                    for ($i = 0; $i < $startDay; $i++) {
                        $table .= '<td></td>';
                    }


                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $currentDayOfWeek = ($startDay + $day - 1) % 7;
                        $isHighlight = $day == $highlightDay ? ' class="highlight"' : '';
                        $table .= '<td' . $isHighlight . '>' . $day . '</td>';

                        if ($currentDayOfWeek == 6 && $day !== $daysInMonth) {
                            $table .= '</tr><tr>';
                        }
                    }


                    $table .= '</table>';
                    echo $table;
                }

                generateCalendar(2010, 5, 5);
                ?>
            </div>
        </body>

        </html>