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
    $uszkodzony = ["33We-001","EN78-001","EN76-001","ED160-002","EP07-002","EN57AL-001","EU160-002","SM42Dn-002","SA106-003","E4MSUa-004","EP07-004","ET22-005","ED160-004","48We-004","E4MSUa-005","EN76-005","SA103-003","36WEhd-002","SA103-004","EN71-004","EN57AKM-007","E4MSUa-007","ED74-005","SA103-008","SM42Dn-007","EN71-010","ED74-007","SM42Dn-008","EP09-009","ED74-009","SA133-012","EP07-007","SA106-009","ED160-012","ED74-010","48We-013","SM42Dn-012","ED250-011","EU160-009","SM42-012","EP07-010","33We-006","ET22-010","SA106-013","48We-015","SA103-012","SM42Dn-014","SA133-019","33We-007","ED160-018","EN57AL-018","36WEhd-013","SA106-019","SA133-022","EN71-020","EU160-014","EP07-012","ED250-021","ED74-017","33We-009","EN71-023","EN71-025","SM42-019","E4MSUa-022","SM42Dn-019","EU160-015","48We-021","EN57AL-025"];
    $w_naprawie = ["SA133-001","ET22-002","SA106-002","SA133-005","EP09-004","48We-003","EP09-005","ET22-004","EU160-004","E4MSUa-003","EN76-004","ED250-005","EP09-008","EN71-003","EN57AL-008","SM42Dn-004","EN78-007","EN78-009","EN78-010","ED74-004","48We-008","ED160-007","SA106-005","EN57AKM-009","EN78-012","SA106-006","E4MSUa-009","SM42-005","48We-009","36WEhd-006","ED74-008","SM42Dn-009","SA133-011","EN57AKM-013","SA103-010","ED250-008","SA133-013","48We-012","E4MSUa-011","33We-004","E4MSUa-014","SA106-012","ED160-014","ED250-012","EN76-011","ED160-015","EP09-013","EN57AKM-020","ED74-012","48We-014","EN78-016","ED250-015","36WEhd-009","E4MSUa-017","ED160-017","SA103-013","ED74-015","ET22-014","EU160-011","SA133-020","48We-017","ED74-016","ED160-020","EU160-013","EN71-021","SM42-016","EP07-013","ET22-016","ED160-021","EN78-021","33We-012","EN78-022","SA133-024",];
    $po_naprawie = ["SM42Dn-001","EN78-002","48We-001","EU160-003","ED74-002","SM42Dn-003","ED250-003","EN57AL-004","EN57AKM-002","EU160-005","EU160-006","SA106-004","EN57AL-009","EN78-006","EN57AKM-005","EN71-006","EN71-008","SM42-007","SA103-007","EP07-006","EN57AKM-011","EN57AKM-012","ET22-008","SA133-010","EN76-007","ED160-011","36WEhd-007","EN57AL-012","EN78-014","EN71-012","EN57AKM-015","EN57AKM-016","SA106-011","EP09-011","SA133-015","EN71-013","EP09-012","EN71-015","ET22-011","ED74-013","ED250-014","EN76-013","SM42Dn-013","EN76-015","SA133-021","SM42Dn-016","E4MSUa-018","ED250-017","48We-018","EN78-018","SA103-016","36WEhd-015","48We-019","33We-011","ET22-017","EN78-019","EN57AL-023","EN57AL-024","SA103-020","48We-022",];
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
    $baza_taborowa = [10,18,40,92,168,206,300,304,404,432,494];
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
            $odpowiedzialnyPracownik = $faker->numberBetween(0,count($baza_taborowa)-1); // pracownik odpowiedzialny za naprawe
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
            $odpowiedzialnyPracownik = $faker->numberBetween(0,count($baza_taborowa)-1); // pracownik odpowiedzialny za naprawe
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
            $odpowiedzialnyPracownik = $faker->numberBetween(0,count($baza_taborowa)-1); // pracownik odpowiedzialny za naprawe
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
            $odpowiedzialnyPracownik = $faker->numberBetween(0,count($baza_taborowa)-1); // pracownik odpowiedzialny za naprawe
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
            $odpowiedzialnyPracownik = $faker->numberBetween(0,count($baza_taborowa)-1); // pracownik odpowiedzialny za naprawe
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
            $odpowiedzialnyPracownik = $faker->numberBetween(0,count($baza_taborowa)-1); // pracownik odpowiedzialny za naprawe
            $str .= ",".$baza_taborowa[$odpowiedzialnyPracownik];
            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>