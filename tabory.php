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
            $str .= $statusy[rand(0,5)].",";// status
            $year = $faker->numberBetween(2014,2020);
            $month = $faker->numberBetween(1,12);
            $str .= $year; // rok ostatniego przeglądu (RRRR-MM-DD)
            $str .= "-";
            $str .= $month<10?"0".$month:$month; // miesiąc ostatniego przeglądu
            $str .= "-";
            $str .= ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28)))); // dzień ostatniego przeglądu
            $str .= ","; // ostatni przegląd koniec
            $str .= $rodzaj[$type_id%3]; // rodzaj
            echo $str;
            array_push($models, $model);
        echo "</div>";
    }
    echo "<div style='display:flex;'>"; // all models
    for($i=0;$i<count($models);++$i){
        echo $models[$i].",";
    }
    echo "</div>";
    ?>
</body>
</html>