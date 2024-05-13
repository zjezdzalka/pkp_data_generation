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
    $uszkodzony = ["33We-001","ET22-002","ET22-003","SM42Dn-001","EN57AL-001","SM42Dn-002","EU160-003","EP09-004","48We-003","EP09-005","ET22-004","EN57AL-003","E4MSUa-003","ED250-003","ED250-005","EN57AL-006","EN57AL-008","EN57AKM-005","48We-007","EN71-006","EN78-011","36WEhd-003","SM42-003","E4MSUa-007","SA103-007","SA103-008","48We-009","ED160-009","E4MSUa-010","SM42Dn-009","SA133-011","48We-011","EN57AKM-013","SM42-009","SA133-012","36WEhd-007","SA133-013","33We-003","SA106-009","ED160-012","ED74-010","SA133-014","ED160-013","EP09-011","SA133-015","SA133-016","EP09-012","ED160-015","EN71-015","EP09-013","EN71-016","EN76-012","ET22-011","SA106-013","EN71-018","ED250-015","SA133-018","SA103-012","EN76-015","ED160-017","SA106-017","ED160-018","36WEhd-013","EP07-012","EN57AL-021","EN76-017","SM42-016","SA106-021","33We-008","48We-020","EN76-018","ED250-022","SA103-018","36WEhd-018","SM42-020","48We-021","33We-013"];
    $w_naprawie = ["EU160-001","SM42-001","SA133-003","ED74-001","SA106-001","48We-001","ED160-003","E4MSUa-002","SM42Dn-003","EP07-004","ET22-005","48We-004","48We-005","EN71-003","EU160-006","EN78-004","EP07-005","36WEhd-002","ED160-005","EN57AKM-004","EN78-008","EN71-007","SA133-008","EN57AKM-006","EN57AKM-007","ED160-007","SA106-005","36WEhd-005","ED250-007","EN78-013","EN57AL-010","36WEhd-006","ED74-008","EU160-007","ET22-008","EN71-011","ED74-009","SA103-010","ED160-011","EN78-014","EP07-009","SM42Dn-010","EP09-010","ED250-009","E4MSUa-013","SM42Dn-011","EN76-010","ED250-010","ED160-014","ED250-012","EU160-009","ED74-011","EU160-010","EN71-017","EN78-016","EN57AL-015","SA106-016","ET22-013","ET22-014","SA133-019","SA133-020","33We-007","EN57AL-017","EP07-011","ED160-019","36WEhd-011","EU160-012","36WEhd-014","EU160-013","E4MSUa-020","36WEhd-015","EN57AL-020","E4MSUa-021","EP07-013","33We-009","ED250-023","EN71-025","SA103-017","33We-011","ED74-018","ED160-022","SM42Dn-020","SA103-019","SA103-020","EU160-015","EU160-016","EN57AL-026"];
    $po_naprawie = ["ED160-002","EP07-002","EN78-003","EU160-004","SA103-001","EN76-004","E4MSUa-004","EP09-006","EP09-008","EN57AL-004","EN57AKM-003","EN78-005","ED250-006","EN71-005","ED160-006","EN78-010","ED74-004","SA103-006","E4MSUa-009","SM42-007","EN71-009","EN71-010","EN57AL-011","EN76-007","ED250-008","EN57AL-012","SA106-008","48We-012","E4MSUa-011","SA106-011","33We-004","SM42Dn-012","E4MSUa-015","EU160-008","ED160-016","EN57AKM-020","ED74-012","ET22-010","48We-015","EN78-017","EN76-014","SM42Dn-014","SM42-014","EU160-011","48We-017","ED250-016","SM42Dn-015","SM42Dn-016","EU160-014","SA103-016","EP09-015","ED250-018","ED250-019","48We-019","SM42-019","ET22-016","SA106-024","SA133-023","EN78-019","EP07-015","EN57AL-025"];
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
            $str .= $w_naprawie[rand(0,count($w_naprawie))].","; // numer taboru
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
            $str .= $po_naprawie[rand(0,count($po_naprawie))].","; // numer taboru
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