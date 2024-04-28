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
        echo "<div>";
            echo ($i + 1).".&nbsp;";
            echo "<p class='firstName'>".$faker->firstName()."</p>";
            echo "<p class='lastName'>".$faker->lastName()."</p>";
            echo "<p class='email'>".$faker->email()."</p>";
        echo "</div>";
    }
    ?>
</body>
</html>