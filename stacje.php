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
    $cities = ["Tczew","Pabianice","Świdnica","Babienica","Jadowniki","Stargard","Bogatynia","Szczawin","Marylka","Knurów","Nowe Kramsko","Kalisz","Gdynia","Bełchatów","Tarnowskie Góry","Lędziny","Ruda Śląska","Krosno","Kołobrzeg","Kolonowskie","Świnoujście","Tychy","Żyrardów","Trzebiatów","Pawłowice","Ostrowiec Świętokrzyski","Gorzów Wielkopolski","Suwałki","Lubliniec","Czarna Woda","Starogard Gdański","Ilkowice","Olsztyn","Studzienice","Bielawa","Tarnów","Brzeg","Kłobuck","Kamień","Bydgoszcz","Mielec","Piotrków Trybunalski","Legionowo","Sopot","Katowice","Mikołów","Ostrów Mazowiecka","Piaseczno","Kuźnica Masłońska","Zgorzelec"];
    $cities2 = ["Tczew","Pabianice","Świdnica","Babienica","Jadowniki","Stargard","Bogatynia","Szczawin","Marylka","Knurów","Nowe Kramsko","Kalisz","Gdynia","Bełchatów","Tarnowskie Góry","Lędziny","Ruda Śląska","Krosno","Kołobrzeg","Kolonowskie","Świnoujście","Tychy","Żyrardów","Trzebiatów","Pawłowice","Ostrowiec Świętokrzyski","Gorzów Wielkopolski","Suwałki","Lubliniec","Czarna Woda","Starogard Gdański","Ilkowice","Olsztyn","Studzienice","Bielawa","Tarnów","Brzeg","Kłobuck","Kamień","Bydgoszcz","Mielec","Piotrków Trybunalski","Legionowo","Sopot","Katowice","Mikołów","Ostrów Mazowiecka","Piaseczno","Kuźnica Masłońska","Zgorzelec"];
    
    echo "new line";
    //cities not in a LK
    for($i=0;$i<197;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $city = $faker->city();
            while(in_array($city, $cities)){
                $city = $faker->city();
            }
            array_push($cities, $city);
            $str = ($i+1).",".$city.",".$faker->numberBetween(1, 31).",".$faker->numberBetween(1, 25); //0-25 TO BIURo, 1-25 LK
            echo $str; // 7 oddziałów random
            /*echo "<p class='lat_y'>".$faker->latitude($min = 49.50, $max = 54) .","."</p>";
            echo "<p class='long_x'>".$faker->longitude($min = 14.50, $max = 23.5).","."</p>"; // 7 oddziałów random*/
            /*echo "<p class='zatrudniony'>".(rand()%2)."</p>"; // 7 oddziałów random*/
        echo "</div>";
    }
    $lk = 0;
    for($i=197;$i<(197 + count($cities2));++$i){
        if($i%2==1){
            $lk++;
        }
        echo "<div style='display:flex;'>";
            $city = $cities2[$i-197];
            $str = ($i+1).",".$city.",".$faker->numberBetween(1, 31).",".$lk; //0-25 TO BIURo, 1-25 LK
            echo $str; // 7 oddziałów random
            /*echo "<p class='lat_y'>".$faker->latitude($min = 49.50, $max = 54) .","."</p>";
            echo "<p class='long_x'>".$faker->longitude($min = 14.50, $max = 23.5).","."</p>"; // 7 oddziałów random*/
            /*echo "<p class='zatrudniony'>".(rand()%2)."</p>"; // 7 oddziałów random*/
        echo "</div>";
    }
    ?>
</body>
</html>