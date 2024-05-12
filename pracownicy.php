<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pracownicy PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    echo "pracownicy w php go brrrrr!";
    $cities = [];
    $maszynisci = [];
    $baza_taborowa = [];
    $nieruchomosci = [];
    $koncowki = ["@gmail.com", "@pkp-sa.pl", "@pkp.pl", "@intercity.pl", "@ic.pl", "@ic-sa.pl", "@intercity-sa.pl"];
    for($i=0;$i<534;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= ($i + 1).","; // inkrementacja
            $name = $faker->name();
            $name = explode(" ", $name);
            /*for($j=0;$j<count($name);++$j){
                echo $name[$j];
            }*/
            $counter = 0;
            while(str_ends_with($name[$counter], ".") || $name[$counter] == "dr" || $name[$counter] == "mgr"){
                $counter++;
            }
            $str .= $name[$counter].","; //imie
            $str .= $name[$counter+1].","; //nazwisko
            $email = strtolower($name[$counter]).".".strtolower($name[$counter+1]).$koncowki[rand(0, count($koncowki)-1)];
            if($i%2==0){
                $str .= "19".","; //stanowisko
                array_push($maszynisci, $i+1);
            }
            else{
                $stanowisko = $faker->numberBetween(3,23);
                $str .= $stanowisko.","; //stanowisko
                if($stanowisko == 23){
                    array_push($baza_taborowa, $i+1);
                }
                else if($stanowisko == 22){
                    array_push($nieruchomosci, $i+1);
                }
                else if($stanowisko == 19){
                    array_push($maszynisci, $i+1);
                }
            }
            $str .= (rand(1,9)); // numer
            for($j = 0; $j<8; ++$j){
                $str .= rand(0,9);
            }
            $str .= ",";
            $str .= $faker->numberBetween(1,31).","; // oddział
            $str .= $email.","; // email
            $str .= (rand(0,15)%15 != 0?1:0); //zatrudniony
            echo $str;
        echo "</div>";
    }
    echo "<div style:'display:flex;'>";
            echo "<p>maszynisci</p>";
            for($j=0;$j<count($maszynisci);++$j){
                echo $maszynisci[$j].",";
            }
        echo "</div>";
        echo "<div style:'display:flex;'>";
            echo "<p>baza taborowa</p>";
            for($j=0;$j<count($baza_taborowa);++$j){
                echo $baza_taborowa[$j].",";
            }
        echo "</div>";
        echo "<div style:'display:flex;'>";
            echo "<p>nieruchomosci</p>";
            for($j=0;$j<count($nieruchomosci);++$j){
                echo $nieruchomosci[$j].",";
            }
        echo "</div>";
    ?>
</body>
</html>