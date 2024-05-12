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
        ["Płock","Jaworzno","Piekary Śląskie","Nowy Sącz","Legnica","Kwidzyn","Jaroszowa Wola","Tczew","Pabianice"],
        ["Łódź","Boguszów-Gorce","Sieradz","Łęczna","Braniewo","Pruszków","Jelcz-Laskowice","Świdnica","Babienica"],
        ["Racibórz","Kielce","Bytom","Kościan","Wągrowiec","Skalbmierz","Świebodzice","Jastarnia","Bieruń","Jadowniki","Stargard"],
        ["Ełk","Kluczbork","Szteklin","Sulejówek","Bezrzecze","Świebodzin","Siemianowice Śląskie","Przemyśl","Jastrzębie-Zdrój","Nowy Targ","Koszalin","Bogatynia","Szczawin"],
        ["Bochnia","Luboń","Poznań","Jelenia Góra","Gliwice","Cieszyn","Świdwin","Września","Śrem","Marylka","Knurów"],
        ["Pszczyna","Żary","Nowe Kramsko","Kalisz"],
        ["Ustka","Koszwały","Wilkowice","Wałbrzych","Jawor","Będzin","Police","Gdynia","Bełchatów"],
        ["Dębica","Swarzędz","Kozienice","Wola Kiedrzyńska","Opole","Tarnowskie Góry","Lędziny"],
        ["Jastrzębie","Szczecin","Łomża","Zakopane","Czerwionka-Leszczyny","Wyszków","Otwock","Piła","Mokrzyska","Ruda Śląska","Krosno"],
        ["Łowicz","Tarnobrzeg","Mysłowice","Konin","Olkusz","Białystok","Kraków","Kołobrzeg","Kolonowskie"],
        ["Ciechanów","Radom","Głogów","Ostrów Wielkopolski","Słupsk","Pilchowo","Świnoujście","Tychy"],
        ["Krapkowice","Brodnica","Chrzanów","Lubin","Chojnice","Leszno","Krotoszyn","Żywiec","Iława","Żyrardów","Trzebiatów"],
        ["Rynarzewo","Bogaczów","Dębogórze","Zborowskie","Chorzów","Kutno","Zduńska Wola","Kamieniec Ząbkowicki","Pawłowice","Ostrowiec Świętokrzyski"],
        ["Koło","Zabrze","Lębork","Kędzierzyn-Koźle","Ławy","Józefów","Gorzów Wielkopolski","Suwałki"],
        ["Skarżysko-Kamienna","Gdańsk","Busko-Zdrój","Ząbki","Tomaszów Mazowiecki","Lubliniec","Czarna Woda"],
        ["Zielona Góra","Pęcice","Żory","Skierniewice","Oświęcim","Lubojenka","Postęp","Starogard Gdański","Ilkowice"],
        ["Nysa","Bartoszyce","Malbork","Magdalenka","Kłodzko","Starachowice","Krępiec","Radomsko","Zamość","Stalowa Wola","Grudziądz","Gorlice","Olsztyn","Studzienice"],
        ["Czeladź","Dzierżoniów","Zgierz","Przędzel","Giżycko","Bielawa","Tarnów"],
        ["Kościerzyna","Warszawa","Łoś","Częstochowa","Orzesze","Czechowice-Dziedzice","Turek","Konstancin-Jeziorna","Brzeg","Kłobuck"],
        ["Dąbrowa Górnicza","Nowy Dwór Mazowiecki","Jeziorna","Jarosław","Biała Podlaska","Darłowo","Włocławek","Szówsko","Rzeszów","Wodzisław Śląski","Kamień","Bydgoszcz"],
        ["Jemielnica","Szczecinek","Płazów","Władysławowo","Wrocław","Szczytno","Inowrocław","Pruszcz Gdański","Nowa Ruda","Mielec","Piotrków Trybunalski"],
        ["Nowa Sól","Chełm","Pułtusk","Ostróda","Gniezno","Myszków","Franciszków","Lubartów","Rumia","Świdnik","Legionowo","Sopot"],
        ["Bielsko-Biała","Rybnik","Pieszyce","Czaplinek","Osówiec","Sochaczew","Puławy","Łaziska Górne","Ostrołęka","Pisz","Jasło","Katowice","Mikołów"],
        ["Świecie","Lidzbark Warmiński","Elbląg","Szwecja","Sanok","Grodzisk Mazowiecki","Lublin","Wejherowo","Toruń","Gołubie","Ostrów Mazowiecka","Piaseczno"],
        ["Bolesławiec","Świętochłowice","Kraśnik","Sandomierz","Siedlce","Kamienica Królewska","Sosnowiec","Ostrzeszów","Kuźnica Masłońska","Zgorzelec"]
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