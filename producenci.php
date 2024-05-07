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
    $names = [
        "Pesa",
        "Newag",
        "Alstom Konstal",
        "H. Cegielski - Fabryka Pojazdów Szynowych",
        "ZNTK Mińsk Mazowiecki",
        "ZNTK Poznań",
        "ZNTK Radom",
        "ZNTK Nowy Sącz",
        "ZNTK Oleśnica",
        "ZNTK Gdańsk",
        "ZNTK Jaworzyna Śląska",
        "ZNTK Zakopane",
        "Pafawag",
        "FPS Łabędy",
        "HCP Szczecin",
        "Konstal",
        "Bombardier Transportation Polska",
        "Siemens Mobility Polska",
        "Stadler Polska",
        "Skoda Transportation Polska",
        "CAF Polska"
    ];
    echo "new line";
    for($i=0;$i<count($names);++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $city = $faker->city();
            $str = ($i+1).","; // id
            $str .= $names[$i].","; // nazwa
            $str .= $city.","; // nazwa
            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>