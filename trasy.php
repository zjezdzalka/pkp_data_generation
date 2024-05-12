<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trasy PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    $lk = [
        ["Płazów","Konin","Swarzędz","Siedlce","Żyrardów","Ciechanów","Osówiec"],
        ["Krosno","Skarżysko-Kamienna","Ostrzeszów","Warszawa","Gdańsk","Chrzanów","Ostrów Mazowiecka","Pszczyna","Śrem","Piaseczno","Wrocław","Mielec"],
        ["Bełchatów","Kamienica Królewska","Nowy Sącz","Tychy","Pieszyce","Wola Kiedrzyńska","Chełm","Jastrzębie","Jastarnia","Żory","Myszków"],
        ["Jeziorna","Ruda Śląska","Ełk","Jawor","Franciszków","Wągrowiec","Legionowo"],
        ["Turek","Rynarzewo","Malbork","Ostróda","Bolesławiec","Sosnowiec","Czechowice-Dziedzice"],
        ["Brzeg","Łomianki","Mysłowice","Szwecja","Świecie","Kielce","Łomża","Łódź","Bieruń","Gniezno","Nowa Sól","Kędzierzyn-Koźle"],
        ["Ustka","Studzienice","Nysa","Lubliniec","Jemielnica","Zielona Góra","Marylka","Kłodzko","Skierniewice","Zakopane"],
        ["Kutno","Bartoszyce","Słupsk","Łaziska Górne","Sieradz","Wyszków","Radom","Kętrzyn","Gorlice","Biała Podlaska","Mokrzyska","Koszwały"],
        ["Chojnice","Giżycko","Cieszyn","Kraśnik","Przędzel","Suwałki","Krępiec","Żary","Dębogórze"],
        ["Przemyśl","Nowy Dwór Mazowiecki","Pilchowo","Jaroszowa Wola","Racibórz","Bydgoszcz","Nowy Targ","Świętochłowice","Zgierz","Oświęcim","Koszalin","Kozienice","Rybnik","Kościerzyna","Skalbmierz","Zabrze","Gdynia"],
        ["Lubin","Babienica","Ostrowiec Świętokrzyski","Jelenia Góra","Łoś","Wodzisław Śląski","Dąbrowa Górnicza","Czerwionka-Leszczyny","Opole","Wejherowo","Świdnik","Jelcz-Laskowice","Szówsko"],
        ["Zamość","Szczawin","Lublin","Kłobuck","Knurów","Września"],
        ["Boguszów-Gorce","Jarosław","Częstochowa","Postęp","Tarnobrzeg","Tczew","Świebodzice","Iława","Leszno","Czeladź","Szczytno"],
        ["Jaworzno","Siemianowice Śląskie","Bielawa","Tomaszów Mazowiecki","Poznań","Ząbki","Stargard","Szczecin","Konstancin-Jeziorna","Piła"],
        ["Jasło","Toruń","Bochnia","Żywiec","Grodzisk Mazowiecki","Ilkowice","Kamieniec Ząbkowicki"],
        ["Zgorzelec","Lubojenka","Świdwin","Olkusz","Jadowniki","Kwidzyn"],
        ["Rzeszów","Gorzów Wielkopolski","Sandomierz","Lubartów","Nowa Ruda","Dębica","Elbląg","Police","Koło","Brodnica","Kościan","Pisz"],
        ["Braniewo","Zborowskie","Krotoszyn","Kołobrzeg","Kamień","Luboń","Starogard Gdański"],
        ["Czarna Woda","Jastrzębie-Zdrój","Darłowo","Lębork","Sopot","Kluczbork","Starachowice"],
        ["Kolonowskie","Sochaczew","Józefów","Pabianice","Bielsko-Biała","Stalowa Wola","Szteklin","Ławy","Bogaczów","Bogatynia"],
        ["Lędziny","Zduńska Wola","Otwock","Kuźnica Masłońska","Władysławowo","Czaplinek","Inowrocław","Płock","Kraków","Orzesze"],
        ["Łowicz","Włocławek","Radomsko","Magdalenka","Tarnowskie Góry","Nowe Kramsko","Zawiercie","Katowice"],
        ["Będzin","Pruszków","Gliwice","Olsztyn","Legnica","Ostrów Wielkopolski","Sulejówek","Szczecinek","Bezrzecze","Mikołów","Lidzbark Warmiński","Sanok","Piekary Śląskie","Pruszcz Gdański","Łęczna"],
        ["Piotrków Trybunalski","Świnoujście","Busko-Zdrój","Chorzów","Wałbrzych","Świebodzin","Trzebiatów","Gołubie","Ostrołęka","Rumia","Pęcice"],
        ["Krapkowice","Grudziądz","Białystok","Świdnica","Tarnów","Pawłowice","Dzierżoniów","Głogów","Pułtusk","Wilkowice"]
    ];

    echo "new line";
    $count = rand(count($lk)*3, count($lk)*10);
    $trasy = [];
    for($i=0;$i<$count;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $linie_kolejowa = $faker->numberBetween(1, 25);
            $a = $faker->numberBetween(0, count($lk[$linie_kolejowa-1])-1);
            $b = $faker->numberBetween(0, count($lk[$linie_kolejowa-1])-1);
            while($a == $b){
                $b = $faker->numberBetween(0, count($lk[$linie_kolejowa-1])-1);
            }
            $ver1 = [$a, $b];
            $ver2 = [$b, $a];
            while(in_array($ver1, $trasy) || in_array($ver2, $trasy)){
                $a = $faker->numberBetween(0, count($lk[$linie_kolejowa-1])-1);
                $b = $faker->numberBetween(0, count($lk[$linie_kolejowa-1])-1);
                while($a == $b){
                    $b = $faker->numberBetween(0, count($lk[$linie_kolejowa-1])-1);
                }
                $ver1 = [$a, $b];
                $ver2 = [$b, $a];
            }
            array_push($ver1, $trasy);
            $str = ($i+1).","; // id
            $str .= $lk[$linie_kolejowa-1][$a].","; // miasto poczatkowa
            $str .= $lk[$linie_kolejowa-1][$b].","; // miasto koncowa
            $str .= $linie_kolejowa; // linia kolejowa
            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>