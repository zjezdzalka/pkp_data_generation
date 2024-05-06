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
    for($i=0;$i<278;++$i){
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
            $str .= $faker->numberBetween(3,21).","; //stanowisko
            $str .= (rand(1,9)); // numer
            for($j = 0; $j<8; ++$j){
                $str .= rand(0,9);
            }
            $str .= ",";
            $str .= $faker->numberBetween(1,31).","; // oddział
            $str .= (rand(0,15)%15 != 0?1:0); //zatrudniony
            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>