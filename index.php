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
    for($i=0;$i<10;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            echo "<p>".($i + 1),","."</p>";
            echo "<p class='firstName'>".$faker->firstName().","."</p>";
            echo "<p class='lastName'>".$faker->lastName().","."</p>";
            echo "<p class='numberRole'>"."1".","."</p>";
            echo "<p class='number'>"."+48".(rand(1,9));
            for($j = 0; $j<8; ++$j){
                echo rand(0,9);
            }
            echo ",</p>";
            echo "<p class='oddział'>".$faker->address().","."</p>"; // 7 oddziałów random
            echo "<p class='biuro'>".$faker->country().","."</p>"; // 7 oddziałów random
            echo "<p class='zatrudniony'>".(rand()%2)."</p>"; // 7 oddziałów random
        echo "</div>";
    }
    ?>
</body>
</html>