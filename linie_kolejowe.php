<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LK PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    $cities = [];
    for($i=0;$i<25;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $city = $faker->city();
            while(in_array($city, $cities)){
                $city = $faker->city();
            }
            array_push($cities, $city);
            $city2 = $faker->city();
            while(in_array($city2, $cities)){
                $city2 = $faker->city();
            }
            array_push($cities, $city2);
            $str = ($i+1).","; // numer linii kolejowej
            $str .= $city.","; //stacja początkowa
            $str .= $city2.","; // stacja końcowa
            $str .= $faker->numberBetween(25, 354); //dystans
            echo $str; 
        echo "</div>";
    }
    echo "all cities";
    echo "<div style='display:flex;'>";
    for($i=0;$i<50;++$i){
        echo '"'.$cities[$i].'"'.","; // lista miast które już są jako początek / koniec LK i nie mogą występować pomiędzy
    }
    echo "</div>";
    ?>
</body>
</html>