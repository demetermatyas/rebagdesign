<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/index.css'>
    <link rel='stylesheet' href='css/style.css'>
</head>

<body>
<div class="center">
    <img src='img/logokep.png' width=200 height=150>
</div>

<h1>Bemutatkozás:</h1>
<h2>Kőhegyi Borcsi vagyok, három fiú édesanyja.</h2>
<h3>Szekrény aljából előkerült kinőtt farmernadrágjaikból készítettem első egyedi táskáimat. Az újrahasznosítás során kreatív alkotásként öntenek újra formát. Szívvel lélekkel készült egyedi kézműves termékről.</h3>
<h2>My name is Borcsi Kohegyi,</h2>
<h3>I used their old worn-out jeans from the bottom of their cupboard and made unique bags/cases. During the recycling I mould them into new forms. Exclusive hand-made products filled with all my heart and soul.</h3>

<h1>Közelgő események amiken megtaláltok:</h1>

<?php
function generateCalendar($month, $year) {
    $first_day = mktime(0, 0, 0, $month, 1, $year);
    $last_day = mktime(0, 0, 0, $month+1, 0, $year);
    $days_of_week = array('Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat', 'Vasárnap');

    $day_of_week = date('w', $first_day-1);
    $day_count = 1;

    echo "<table class='calendar'>";
    echo "<caption>" . date('F Y', $first_day) . "</caption>";
    echo "<tr>";
    foreach($days_of_week as $day) {
        echo "<th>$day</th>";
    }
    echo "</tr>";

    echo "<tr>";
    for($x = 0; $x < $day_of_week; $x++) {
        echo "<td></td>";
    }
    while($day_count <= date('t', $last_day)) {
        if($day_of_week == 7) {
            $day_of_week = 0;
            echo "</tr><tr>";
        }
        $day_count_str = str_pad($day_count, 2, '0', STR_PAD_LEFT);
        echo "<td><button name='selected_date' value='$year-$month-$day_count_str'>$day_count</button></td>";
        $day_count++;
        $day_of_week++;
    }
    if($day_of_week < 7) {
        for($x = 0; $x < (7 - $day_of_week); $x++) {
            echo "<td></td>";
        }
    }
    echo "</tr>";
    echo "</table>";
}

$current_month = date('m');
$current_year = date('Y');

if (isset($_POST['next_month'])) {
    $current_month++;
    if ($current_month == 13) {
        $current_month = 1;
        $current_year++;
    }
}

if (isset($_POST['prev_month'])) {
    $current_month--;
    if ($current_month == 0) {
        $current_month = 12;
        $current_year--;
    }
}

?>

<form method="post">
    <div class="center">
        <button type="submit" name="prev_month" value="true">&lt; Előző hónap</button>
        <?php generateCalendar($current_month, $current_year); ?>
        <button type="submit" name="next_month" value="true">Következő hónap &gt;</button>
    </div>
</form>

<h1>Árlista:</h1>
<div class="center">
    <img src='img/arlista.jpg' width="600" height="1000" alt='Árlista'>
</div>
<h2></h2>

</body>
</html>
