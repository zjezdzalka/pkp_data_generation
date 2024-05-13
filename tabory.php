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
    /*$names = [
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
    ];*/
    $tabory = [
        "SA133-001","EU160-001","ET22-001","33We-001","EP07-001","ED160-001","SM42-001","EN78-001","EN57AKM-001","SA133-002","ET22-002","EN76-001","EP09-001","SA133-003","ED160-002","EP09-002","EN76-002","ED250-001","ED74-001",
        "EN76-003","SA106-001","ET22-003","EP09-003","EP07-002","SM42Dn-001","EN78-002","EN57AL-001","E4MSUa-001","48We-001","SA133-004","ED250-002","EN78-003","EP07-003","EU160-002","48We-002","SM42Dn-002","EN71-001","SA106-002",
        "EU160-003","ED160-003","E4MSUa-002","SA133-005","EN57AL-002","EP09-004","EN71-002","ED74-002","48We-003","SA106-003","EP09-005","ET22-004","EU160-004","SM42Dn-003","EN57AL-003","E4MSUa-003","SA103-001","EN76-004","ED250-003",
        "SA133-006","E4MSUa-004","ED250-004","ED250-005","EP09-006","EP07-004","ET22-005","ED160-004","EP09-007","48We-004","48We-005","EP09-008","EN71-003","EN57AL-004","EN57AKM-002","EN57AKM-003","E4MSUa-005","SA103-002","EN57AL-005",
        "EU160-005","EU160-006","EN76-005","ED74-003","EN78-004","EN57AL-006","SA103-003","EP07-005","EN57AL-007","EN78-005","SA106-004","EN57AL-008","36WEhd-001","EN57AL-009","EN78-006","36WEhd-002","SA103-004","EN71-004","SM42Dn-004",
        "EN78-007","ED160-005","48We-006","EN57AKM-004","EN57AKM-005","ED250-006","EN71-005","EN78-008","ED160-006","EN78-009","ET22-006","ET22-007","EN76-006","48We-007","E4MSUa-006","EN71-006","SA133-007","EN71-007","SA133-008","EN57AKM-006",
        "EN78-010","EN78-011","SM42-002","SA103-005","ED74-004","EN57AKM-007","36WEhd-003","SA133-009","36WEhd-004","48We-008","SM42-003","EN57AKM-008","ED160-007","SA106-005","36WEhd-005","EN57AKM-009","SA103-006","E4MSUa-007","SM42Dn-005","ED74-005",
        "EN78-012","EN57AKM-010","E4MSUa-008","SA106-006","E4MSUa-009","SM42-004","SM42Dn-006","EN71-008","SM42-005","SM42-006","SM42-007","SA103-007","33We-002","SA103-008","ED250-007","SM42-008","SM42Dn-007","EN78-013","ED160-008","EN57AL-010",
        "EN71-009","EP07-006","ED74-006","48We-009","EN71-010","ED74-007","36WEhd-006","EN57AKM-011","ED74-008","SA103-009","EN57AL-011","EU160-007","EN57AKM-012","ET22-008","48We-010","ED160-009","SM42Dn-008","E4MSUa-010","SM42Dn-009","EN71-011",
        "EP09-009","SA133-010","SA133-011","48We-011","EN57AKM-013","ED74-009","EN76-007","SA103-010","ED160-010","ED250-008","SM42-009","ED160-011","SA133-012","EP07-007","36WEhd-007","SM42-010","SA133-013","EP07-008","EN57AL-012","SA106-007","EN78-014",
        "33We-003","SA106-008","EN57AKM-014","SA106-009","ED160-012","48We-012","EP07-009","E4MSUa-011","EN71-012","EN76-008","SA103-011","E4MSUa-012","SM42Dn-010","SA106-010","ED74-010","SA133-014","EP09-010","EN57AKM-015","EN57AKM-016","SA106-011","ED250-009",
        "EN76-009","E4MSUa-013","ED160-013","SM42Dn-011","33We-004","EN57AKM-017","E4MSUa-014","48We-013","EN76-010","ED250-010","EP09-011","EN57AKM-018","SA133-015","SM42Dn-012","ED250-011","E4MSUa-015","SA106-012","EN71-013","ET22-009","ED160-014","EN57AKM-019",
        "SA133-016","EU160-008","EP09-012","SM42-011","ED250-012","ED250-013","EN76-011","EU160-009","33We-005","SM42-012","SA133-017","EN71-014","EP07-010","ED160-015","ED74-011","ED160-016","EN71-015","36WEhd-008","EP09-013","33We-006",
        "EN57AKM-020","EN71-016","ED74-012","EU160-010","ET22-010","EN76-012","48We-014","ET22-011","ED74-013","EN57AKM-021","ED250-014","SA106-013","EN71-017","EN71-018","48We-015","EN57AL-013","EN78-015","EN76-013","ED74-014","E4MSUa-016",
        "EN57AL-014","EP09-014","EN78-016","ED250-015","36WEhd-009","SA133-018","EN78-017","36WEhd-010","SA103-012","ET22-012","SM42Dn-013","EN76-014","SA106-014","SM42-013","EN57AL-015","E4MSUa-017","EN76-015","SA106-015","SA106-016","ED160-017",
        "SA103-013","ED74-015","SM42Dn-014","EN57AL-016","EN71-019","ET22-013","ET22-014","SM42-014","SA133-019","EU160-011","48We-016","SA133-020","33We-007","EN57AL-017","SM42-015","EP07-011","SA133-021","SA106-017","ED160-018","48We-017","ED250-016",
        "SA103-014","SA106-018","ED160-019","SM42Dn-015","SM42Dn-016","EN57AKM-022","E4MSUa-018","ED250-017","EN57AL-018","36WEhd-011","ED74-016","36WEhd-012","36WEhd-013","SA103-015","SM42Dn-017","ED160-020","48We-018","EN57AL-019","SA106-019","EU160-012",
        "SA106-020","SA133-022","EN71-020","E4MSUa-019","36WEhd-014","EU160-013","EN78-018","EU160-014","SA103-016","EP07-012","EP09-015","ED250-018","E4MSUa-020","ED250-019","36WEhd-015","SM42Dn-018","ED250-020","36WEhd-016","EN71-021","ED250-021","EN57AL-020",
        "EN76-016","EN57AL-021","48We-019","EN76-017","SM42-016","EN71-022","ED74-017","SM42-017","SA106-021","33We-008","E4MSUa-021","EP07-013","33We-009","36WEhd-017","EN71-023","48We-020","EN76-018","EP07-014","ET22-015","ED250-022","ED250-023",
        "33We-010","SA106-022","SA106-023","EN71-024","EN71-025","SM42-018","SA103-017","SM42-019","EN76-019","ET22-016","SA106-024","EN57AL-022","SA133-023","33We-011","E4MSUa-022","SM42Dn-019","ET22-017","EN78-019","ED74-018","EN57AL-023","E4MSUa-023",
        "SA103-018","ED160-021","EN78-020","36WEhd-018","EN78-021","ED160-022","SM42-020","33We-012","EN78-022","SM42Dn-020","SA103-019","EN57AL-024","SA103-020","ED250-024","EP07-015","ED250-025","EU160-015","ED74-019","48We-021","EU160-016","EN57AL-025",
        "33We-013","SA133-024","EN57AL-026","48We-022"
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
    //for($i=0;$i<427;++$i){
    for($i=0;$i<count($tabory);++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            /*$type_id = rand(0,20);
            $type = $names[$type_id];
            $counter[$type_id]++;
            $type_nr = $counter[$type_id];
            $model = $type."-"; // id*/
            $model = $tabory[$i];
            /*for($j=0;$j<3-strlen($type_nr);++$j){
                $model .= "0";
            }*/
            /*$model .= $type_nr;*/
            $str = $model.",";// numer taboru (id)
            
            $str .= rand(1,21).",";
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
            $str .= $rodzaj[$i%3]; // rodzaj
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