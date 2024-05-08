<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabory PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    $names = [
        "ET22",
        "EP07",
        "EP09",
        "EN76",
        "33We",
        "48We",
        "EN78",
        "EN57AKM",
        "EN57AL",
        "EN71",
        "ED74",
        "SA103",
        "SA106",
        "36WEhd",
        "ED160",
        "ED250",
        "SA133",
        "SM42",
        "EU160",
        "SM42Dn",
        "E4MSUa"
    ];
    $statusy = ["nowy", "uszkodzony", "po naprawie", "w naprawie", "w trakcie złomowania", "złomowany"];
    $rodzaj = ["elektryczny", "spalinowy", "elektryczno-spalinowy"];
    $counter = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    $models = [];
    $uszkodzony = [];
    $w_naprawie = [];
    $po_naprawie = [];
    $nowy = [];

    echo "new line";
    for($i=0;$i<427;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $type_id = rand(0,20);
            $type = $names[$type_id];
            $counter[$type_id]++;
            $type_nr = $counter[$type_id];
            $model = $type."-"; // id
            for($j=0;$j<3-strlen($type_nr);++$j){
                $model .= "0";
            }
            $model .= $type_nr;
            $str = $model.",";// numer taboru (id)
            $str .= $faker->numberBetween(1980,2014).",";// rok produkcji
            $status = rand(0,5);
            if($status == 1) array_push($uszkodzony, $model);
            else if($status == 2) array_push($po_naprawie, $model);
            else if($status == 3) array_push($w_naprawie, $model);
            else if($status == 0) array_push($nowy, $model);
            $str .= $statusy[$status].",";// status
            $year = $faker->numberBetween(2014,2020);
            $month = $faker->numberBetween(1,12);
            $str .= $year; // rok ostatniego przeglądu (RRRR-MM-DD)
            $str .= "-";
            $str .= $month<10?"0".$month:$month; // miesiąc ostatniego przeglądu
            $str .= "-";
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $date; // dzień ostatniego przeglądu
            $str .= ","; // ostatni przegląd koniec
            $str .= $rodzaj[$type_id%3]; // rodzaj
            echo $str;
            array_push($models, $model);
        echo "</div>";
    }
    echo "<div style='display:flex;'>"; // all models
    for($i=0;$i<count($models);++$i){
        echo '"'.$models[$i].'"'.",";
    }
    echo "</div>";
    echo "<p>uszkodzone</p>";
    echo "<div style='display:flex;'>"; // uszkodzone
    for($i=0;$i<count($uszkodzony);++$i){
        echo '"'.$uszkodzony[$i].'"'.",";
    }
    echo "</div>";
    echo "<p>w naprawie</p>";
    echo "<div style='display:flex;'>"; // w naprawie
    for($i=0;$i<count($w_naprawie);++$i){
        echo '"'.$w_naprawie[$i].'"'.",";
    }
    echo "</div>";
    echo "<p>po naprawie</p>";
    echo "<div style='display:flex;'>"; // po naprawie
    for($i=0;$i<count($po_naprawie);++$i){
        echo '"'.$po_naprawie[$i].'"'.",";
    }
    echo "</div>";
    echo "<p>nowy</p>";
    echo "<div style='display:flex;'>"; // po naprawie
    for($i=0;$i<count($nowy);++$i){
        echo '"'.$nowy[$i].'"'.",";
    }
    echo "</div>";
    ?>
</body>
</html>