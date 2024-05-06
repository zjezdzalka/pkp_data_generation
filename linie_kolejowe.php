<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PHP</title>
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
            $str = ($i+1).",".$city.",".$city2.",".$faker->numberBetween(25, 354);
            echo $str; // 7 oddziałów random
            /*echo "<p class='lat_y'>".$faker->latitude($min = 49.50, $max = 54) .","."</p>";
            echo "<p class='long_x'>".$faker->longitude($min = 14.50, $max = 23.5).","."</p>"; // 7 oddziałów random*/
            /*echo "<p class='zatrudniony'>".(rand()%2)."</p>"; // 7 oddziałów random*/
        echo "</div>";
    }
    echo "new line";
    //cities not in a LK
    for($i=0;$i<125;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $city = $faker->city();
            while(in_array($city, $cities)){
                $city = $faker->city();
            }
            array_push($cities, $city);
            $str = ($i+1).",".$city;
            echo $str; // 7 oddziałów random
            /*echo "<p class='lat_y'>".$faker->latitude($min = 49.50, $max = 54) .","."</p>";
            echo "<p class='long_x'>".$faker->longitude($min = 14.50, $max = 23.5).","."</p>"; // 7 oddziałów random*/
            /*echo "<p class='zatrudniony'>".(rand()%2)."</p>"; // 7 oddziałów random*/
        echo "</div>";
    }
    ?>
</body>
</html>