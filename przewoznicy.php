<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przewoźnicy PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    $names = ["Intercity","Koleje Wielkopolskie","Polregio","Koleje Dolnośląskie","Koleje Mazowieckie","Arriva","Koleje Zachodniopomorskie","Koleje Opolskie","Koleje Śląskie","Twoje Linie Kolejowe","Express Intercity Premium","Express Intercity","Szybka Kolej Miejska","PKP Cargo","Ceske Drahy","Deutsche Bahn","RegioJet","Łódzka Kolej Aglomeracyjna","Koleje Małopolskie", "Średzka Kolej Wąskotorowa", "Zastępcza Komunikacja Autobusowa"];
    $acronyms = ["IC", "KW", "PR", "KD", "KMaz", "AR", "KZ", "KO", "KŚ", "TLK", "EIP", "EI", "SKM", "PKP", "CD", "DB", "RJ", "ŁKA", "KMał", "ŚKW", "ZKA"];
    echo "new line";
    for($i=0;$i<count($names);++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $year = $faker->numberBetween(1974,2012);
            $type = "";
            $acronyms[$i] == "PKP"?$type = "cargo":$type = "pasażerskie";
            $str = ($i+1).","; // id
            $str .= $names[$i].","; // nazwa
            /*$str .= $acronyms[$i].","; // skrót*/
            $str .= $year.","; // rok powstania
            $str .= $type; // typ
            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>