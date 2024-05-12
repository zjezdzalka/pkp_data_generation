<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacje PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    $cities = ["Ciechanów","Osówiec","Wrocław","Mielec","Żory","Myszków","Wągrowiec","Legionowo","Sosnowiec","Czechowice-Dziedzice","Nowa Sól","Kędzierzyn-Koźle","Skierniewice","Zakopane","Mokrzyska","Koszwały","Żary","Dębogórze","Zabrze","Gdynia","Jelcz-Laskowice","Szówsko","Knurów","Września","Czeladź","Szczytno","Konstancin-Jeziorna","Piła","Ilkowice","Kamieniec Ząbkowicki","Jadowniki","Kwidzyn","Kościan","Pisz","Luboń","Starogard Gdański","Kluczbork","Starachowice","Bogaczów","Bogatynia","Kraków","Orzesze","Zawiercie","Katowice","Pruszcz Gdański","Łęczna","Rumia","Pęcice","Pułtusk","Wilkowice"];
    $cities2 = ["Ciechanów","Osówiec","Wrocław","Mielec","Żory","Myszków","Wągrowiec","Legionowo","Sosnowiec","Czechowice-Dziedzice","Nowa Sól","Kędzierzyn-Koźle","Skierniewice","Zakopane","Mokrzyska","Koszwały","Żary","Dębogórze","Zabrze","Gdynia","Jelcz-Laskowice","Szówsko","Knurów","Września","Czeladź","Szczytno","Konstancin-Jeziorna","Piła","Ilkowice","Kamieniec Ząbkowicki","Jadowniki","Kwidzyn","Kościan","Pisz","Luboń","Starogard Gdański","Kluczbork","Starachowice","Bogaczów","Bogatynia","Kraków","Orzesze","Zawiercie","Katowice","Pruszcz Gdański","Łęczna","Rumia","Pęcice","Pułtusk","Wilkowice"];
    $linie = [];
    for($i=0;$i<25;$i++){
        array_push($linie, []);
    }
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
            $str = ($i+1).",";//id
            $str .= $city.","; // miasto
            $str .= $faker->numberBetween(1, 31).","; // oddział
            $lk = $faker->numberBetween(1, 25);
            $str .= $lk; //linia kolejowa
            array_push($linie[$lk-1], $city);
            echo $str; 
        echo "</div>";
    }
    $lk = 0;
    for($i=197;$i<(197 + count($cities2));++$i){
        if($i%2==1){
            $lk++;
        }
        echo "<div style='display:flex;'>";
            $city = $cities2[$i-197];
            $str = ($i+1).",";//id
            $str .= $city.","; // miasto
            $str .= $faker->numberBetween(1, 31).","; // oddział
            $str .= $lk; // linia kolejowa
            array_push($linie[$lk-1], $city);
            echo $str;
        echo "</div>";
    }
    for($i=0;$i<25;$i++){
        echo "<div style='display:flex;'>";
            echo "[";
            for($j=0;$j<count($linie[$i]);$j++){
                echo '"'.$linie[$i][$j].'"';
                if($j != count($linie[$i])-1){
                    echo ",";
                }
                else{
                    if($i!=24){
                        echo "],";
                    }
                    else{
                        echo "]";
                    }
                }
            }
        echo "</div>";
    }
    ?>
</body>
</html>