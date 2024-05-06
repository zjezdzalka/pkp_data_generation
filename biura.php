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
    
    echo "new line";
    //biura
    for($i=0;$i<31;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $adres = $faker->address();
            $adres3 = explode(",", $adres);
            $adres2 = explode(" ", $adres3[1]);
            $city = "";
            for($j=2;$j<=count($adres2)-1;++$j){
                $city .= $adres2[$j];
            }
            $str = ($i+1).",".$city.","; //
            for($j=0;$j<count($adres3) - 1;++$j){
                $str .= $adres3[0];
                if($j != count($adres3) - 2){
                    $str .= ",";
                }
            }
            $str .= ",".$adres2[1];
            echo $str; 
        echo "</div>";
    }
    ?>
</body>
</html>