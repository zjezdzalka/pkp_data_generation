<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naprawy PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    $uszkodzony = ["SM42Dn-001","EP09-002","SA103-002","36WEhd-002","48We-002","33We-001","ED74-002","EP07-002","EN71-002","SA106-007","EU160-003","ET22-002","SM42-002","36WEhd-006","EU160-005","EP07-003","E4MSUa-004","EP09-005","SA106-010","SM42-003","SM42-004","EN57AKM-003","EN78-004","ED74-006","SA103-012","EN76-009","48We-008","EU160-009","EU160-010","EP07-008","E4MSUa-007","SA106-015","ED74-009","SA133-009","EN57AKM-007","EN78-011","EN71-014","SA103-016","SM42-007","EP07-009","33We-011","33We-012","SA133-014","EN78-013","SA103-017","SA103-018","48We-010","33We-015","EN57AL-009","33We-017","EN78-018","SA103-021","ED250-011","SM42-011","SA106-021","E4MSUa-015","EN71-017","SA103-023","EN78-022","36WEhd-017","EN57AL-011","36WEhd-018","EU160-014","EN76-016","SM42Dn-012","SA106-025","SA106-027","EN71-021","48We-018","EU160-019","EN76-022","EN76-023","EN78-025","ED160-015"];
    $w_naprawie = ["EU160-001","EN76-002","36WEhd-001","SA106-002","EN57AL-001","SA103-001","48We-001","SA106-003","E4MSUa-002","ET22-001","36WEhd-005","48We-005","SA133-003","SA103-004","EN76-005","SA103-007","SM42Dn-004","EN78-005","EN57AL-004","ED160-004","ED250-004","48We-007","EP09-007","SA106-013","ET22-006","EN78-008","EN57AKM-005","EN76-012","ED74-010","SA133-010","EN71-013","ED160-008","EN57AKM-009","EN78-012","SA133-011","SA133-012","SM42-008","33We-014","48We-011","SM42Dn-009","SM42-010","SA133-016","EP09-010","48We-013","SA103-022","ED74-013","EP07-014","ED74-014","ET22-009","EP07-016","SA106-023","EP09-013","EP07-017","SM42Dn-011","ED160-012","ED250-014","48We-016","EN71-019","SM42-015","48We-017","EN57AKM-013","ED250-017","33We-020","33We-021","SA103-031","EP09-017","E4MSUa-017","SM42-016","EN57AKM-017","SA103-032","EU160-018","ET22-012","EP09-019"];
    $po_naprawie = ["EN78-001","EN71-001","E4MSUa-001","EN57AKM-002","SA106-005","36WEhd-004","SA106-006","SA133-002","EU160-004","33We-003","EP09-004","SA103-005","SA103-006","EN78-002","SA106-012","E4MSUa-005","EP07-004","EN78-006","EP07-005","EN78-007","EP07-006","EP09-008","36WEhd-010","EP07-007","36WEhd-011","SA106-014","48We-009","ED250-007","SA103-014","EN78-009","SA106-017","33We-009","SM42-006","EU160-011","E4MSUa-010","SA133-015","EU160-012","33We-016","EN78-015","E4MSUa-013","EN78-017","SA133-017","ET22-007","EP09-011","SM42-012","SM42-013","EN57AL-010","ED160-010","SA103-027","36WEhd-016","ET22-010","ED250-013","ED74-017","EN76-017","ED250-015","EN78-024","SA106-028","ED250-018","33We-022","36WEhd-019","48We-020"];
    $status = ["nie rozpoczęte", "w naprawie", "po naprawie"];
    $przyczyny = [
        "zużycie mechaniczne",
        "awaria elektryczna",
        "niedostateczna konserwacja",
        "wypadki drogowe",
        "zakamienienie lub korozja",
        "błąd ludzki",
        "uszkodzenia spowodowane zewnętrznymi czynnikami",
        "niewłaściwe użytkowanie",
        "problemy z układem hamulcowym",
        "niedostateczne smarowanie",
        "uszkodzenie przez wandalizm",
        "awaria systemu chłodzenia",
        "problemy z układem paliwowym",
        "uszkodzenia spowodowane uderzeniami",
        "defekty fabryczne lub wadliwe części"
    ];
    $baza_taborowa = [36,100,134,162,170,180,242,344,356,368,380,410,448];
    echo "generation start:";
    $id = 1;
    for($i=0;$i<(count($uszkodzony));++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= $id.","; // id
            $id ++;
            $str .= $uszkodzony[$i].","; // numer taboru
            $year = $faker->numberBetween(2022,2023);
            $month = $faker->numberBetween(1,12);
            if($month<10){
                $month = "0".$month;
            }
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $year."-".$month."-".$date.","; // data uszkodzenia
            $str .= $status[0].","; // status
            $miejsce_uszkodzenia = $faker->city();
            $str .= $miejsce_uszkodzenia.","; // miejsce uszkodzenia
            $przyczyna = $faker->numberBetween(0,14);
            $str .= $przyczyny[$przyczyna]; // przyczyna
            $odpowiedzialnyPracownik = $faker->numberBetween(0,12); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    //rok 2021 uszkodzenia
    for($i=0;$i<(count($w_naprawie));++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= $id.","; // id
            $id ++;
            $str .= $w_naprawie[$i].","; // numer taboru
            $year = $faker->numberBetween(2022,2023);
            $month = $faker->numberBetween(1,12);
            if($month<10){
                $month = "0".$month;
            }
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $year."-".$month."-".$date.","; // data uszkodzenia
            $str .= $status[1].","; // status
            $miejsce_uszkodzenia = $faker->city();
            $str .= $miejsce_uszkodzenia.","; // miejsce uszkodzenia
            $przyczyna = $faker->numberBetween(0,14);
            $str .= $przyczyny[$przyczyna]; // przyczyna
            $odpowiedzialnyPracownik = $faker->numberBetween(0,12); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    for($i=0;$i<(count($po_naprawie));++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= $id.","; // id
            $id ++;
            $str .= $po_naprawie[$i].","; // numer taboru
            $year = $faker->numberBetween(2022,2023);
            $month = $faker->numberBetween(1,12);
            if($month<10){
                $month = "0".$month;
            }
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $year."-".$month."-".$date.","; // data uszkodzenia
            $str .= $status[2].","; // status
            $miejsce_uszkodzenia = $faker->city();
            $str .= $miejsce_uszkodzenia.","; // miejsce uszkodzenia
            $przyczyna = $faker->numberBetween(0,14);
            $str .= $przyczyny[$przyczyna]; // przyczyna
            $odpowiedzialnyPracownik = $faker->numberBetween(0,12); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    for($i=0;$i<(7);++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= $id.","; // id
            $id ++;
            $str .= $uszkodzony[rand(1,count($uszkodzony))].","; // numer taboru
            $year = 2021;
            $month = $faker->numberBetween(1,12);
            if($month<10){
                $month = "0".$month;
            }
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $year."-".$month."-".$date.","; // data uszkodzenia
            $str .= $status[2].","; // status
            $miejsce_uszkodzenia = $faker->city();
            $str .= $miejsce_uszkodzenia.","; // miejsce uszkodzenia
            $przyczyna = $faker->numberBetween(0,14);
            $str .= $przyczyny[$przyczyna]; // przyczyna
            $odpowiedzialnyPracownik = $faker->numberBetween(0,12); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    for($i=0;$i<(4);++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= $id.","; // id
            $id ++;
            $str .= $w_naprawie[rand(1,count($w_naprawie))].","; // numer taboru
            $year = 2021;
            $month = $faker->numberBetween(1,12);
            if($month<10){
                $month = "0".$month;
            }
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $year."-".$month."-".$date.","; // data uszkodzenia
            $str .= $status[2].","; // status
            $miejsce_uszkodzenia = $faker->city();
            $str .= $miejsce_uszkodzenia.","; // miejsce uszkodzenia
            $przyczyna = $faker->numberBetween(0,14);
            $str .= $przyczyny[$przyczyna]; // przyczyna
            $odpowiedzialnyPracownik = $faker->numberBetween(0,12); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    for($i=0;$i<(10);++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= $id.","; // id
            $id ++;
            $str .= $po_naprawie[rand(1,count($po_naprawie))].","; // numer taboru
            $year = 2021;
            $month = $faker->numberBetween(1,12);
            if($month<10){
                $month = "0".$month;
            }
            $date = ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)?$faker->numberBetween(1,31):
            (($month==4||$month==6||$month==9||$month==11)?$faker->numberBetween(1,30):
            (($year%4==400)?$faker->numberBetween(1,29):
            (($year%4==0 && $year%100!=0)?$faker->numberBetween(1,29):$faker->numberBetween(1,28))));
            if($date<10){
                $date = "0".$date;
            }
            $str .= $year."-".$month."-".$date.","; // data uszkodzenia
            $str .= $status[2].","; // status
            $miejsce_uszkodzenia = $faker->city();
            $str .= $miejsce_uszkodzenia.","; // miejsce uszkodzenia
            $przyczyna = $faker->numberBetween(0,14);
            $str .= $przyczyny[$przyczyna]; // przyczyna
            $odpowiedzialnyPracownik = $faker->numberBetween(0,12); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>