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
    echo "Hello World!";
    $cities = [];
    for($i=0;$i<10;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            echo "<p>".($i + 1),","."</p>";
            $name = $faker->name();
            $name = explode(" ", $name);
            /*for($j=0;$j<count($name);++$j){
                echo $name[$j];
            }*/
            $counter = 0;
            while(str_ends_with($name[$counter], ".") || $name[$counter] == "dr" || $name[$counter] == "mgr"){
                $counter++;
            }
            echo "<p class='firstName'>".$name[$counter].","."</p>";
            echo "<p class='lastName'>".$name[$counter+1].","."</p>";
            echo "<p class='numberRole'>"."1".","."</p>";
            echo "<p class='number'>"."+48".(rand(1,9));
            for($j = 0; $j<8; ++$j){
                echo rand(0,9);
            }
            echo ",</p>";
            echo "<p class='oddział'>".$faker->address().","."</p>"; // 7 oddziałów random
            echo "<p class='biuro'>".$faker->country().","."</p>"; // 7 oddziałów random
            $city = $faker->city();
            while(in_array($city, $cities)){
                $city = $faker->city();
            }
            array_push($cities, $city);
            echo "<p class='miasto'>".end($cities).","."</p>"; // 7 oddziałów random
            echo "<p class='lat_y'>".$faker->latitude($min = 49.50, $max = 54) .","."</p>";
            echo "<p class='long_x'>".$faker->longitude($min = 14.50, $max = 23.5).","."</p>"; // 7 oddziałów random
            echo "<p class='zatrudniony'>".(rand()%2)."</p>"; // 7 oddziałów random
        echo "</div>";
    }
    ?>
</body>
</html>