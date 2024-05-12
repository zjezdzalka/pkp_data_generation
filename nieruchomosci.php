<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieruchomości PHP</title>
</head>
<body>
    <?php
    require_once 'vendor/autoload.php';
    echo "nieruchomosci w php stoją XD!";
    $cities = [];
    $types = ["budynek", "działka", "lokal"];
    $opisy_budynek = [
        "Przestronne mieszkanie (80 m²) w spokojnej okolicy, blisko pięknego parku. Duże okna, widok na drzewa i kwiaty z balkonu. Idealne dla miłośników natury i spokoju.",
        "Nowoczesny apartament (60 m²) w centrum miasta z restauracjami, sklepami i atrakcjami. Wyposażony w klimatyzację i inteligentny system domowy, zapewniający komfortowe życie w dynamicznym otoczeniu miejskim.",
        "Uroczy dom na przedmieściach z ogrodem i tarasem, harmonia między domowym ogniskiem a relaksem na świeżym powietrzu. Przestronny taras z widokiem na ogród, idealny na rodzinne grillowanie i spotkania.",
        "Ekskluzywna rezydencja z 300-metrowym ogrodem i basenem. Luksusowy styl życia, wyjątkowe wzornictwo i panoramiczne widoki.",
        "Kamienica z klimatem w centrum! Odrestaurowana z urokiem i nowoczesnością. Drewniane belki, kute balustrady, antyczne meble. Idealna dla miłośników historii i estetyki.",
        "Przestronny dom rodzinny! 200 m² idealne dla rodziny. Duży salon, jasna kuchnia, cztery sypialnie i przestronny ogród. Doskonałe warunki do życia i relaksu.",
        "Stylowa loftowa przestrzeń! Loft w fabrycznym budynku. Industrialny charakter, nowoczesny styl. Wysokie sufity, duże okna, otwarta przestrzeń. Nietuzinkowe mieszkanie.",
        "Elegancka willa nad morzem! Panoramiczny widok na morze, prywatna plaża. Przestronne tarasy, luksusowe wyposażenie, dostęp do wody. Idealna dla miłośników luksusu i relaksu.",
        "Apartament z widokiem na góry! Urokliwy apartament na wzgórzu. Widoki na góry i jezioro, zachody słońca. Idealny dla miłośników przyrody i spokoju.",
        "Komfortowy dom w lesie! Cisza natury, nowoczesny komfort. Duże okna, taras z widokiem na drzewa, przytulny kominek. Idealne schronienie wśród przyrody."
    ];
    $opisy_lokale = [
        "Przytulna kawiarnia w centrum! Urokliwa kawiarnia z miłą atmosferą. Idealna na spotkania czy relaks przy kawie.",
        "Nowoczesny biurowiec w prestiżowej dzielnicy. Dogodna lokalizacja i wysoka jakość biur.",
        "Stylowy salon fryzjerski z pełnym wyposażeniem. Eleganckie otoczenie i wysoka jakość usług.",
        "Przestronny lokal handlowy z dużymi witrynami. Ruchliwa lokalizacja i elastyczna przestrzeń.",
        "Klimatyczna restauracja z ogródkiem letnim. Wykwintna kuchnia i przytulna atmosfera.",
        "Nowoczesne studio fitness z bogatą ofertą zajęć. Doświadczeni instruktorzy i wysokiej jakości sprzęt.",
        "Ekskluzywny butik z designerskimi ubraniami. Wyjątkowe kolekcje i eleganckie wnętrze.",
        "Kreatywne biuro coworkingowe dla freelancerów. Elastyczna przestrzeń i inspirująca atmosfera.",
        "Przyjazny klub fitness dla całej rodziny. Bogata oferta zajęć i udogodnień.",
        "Nowoczesny gabinet medyczny z kompleksową opieką. Profesjonalna opieka i najnowszy sprzęt.",
    ];
    $opisy_dzialki = [
        "Urokliwa działka nad jeziorem z prywatnym dostępem do wody! Idealne miejsce na budowę domu letniskowego lub całorocznego.",
        "Rozległa działka rolna w otoczeniu pól i łąk! Doskonałe warunki do uprawy roślin lub hodowli zwierząt.",
        "Malownicza działka leśna w górach! Raj dla miłośników przyrody z możliwością budowy domu letniskowego.",
        "Działka rekreacyjna z sadem owocowym! Idealna na spędzanie czasu na świeżym powietrzu i zbieranie świeżych owoców.",
        "Działka budowlana z widokiem na góry! Niesamowite widoki i możliwość budowy domu z panoramicznymi oknami.",
        "Działka w rejonie turystycznym z potencjałem inwestycyjnym! Doskonała opcja inwestycyjna w branży turystycznej.",
        "Działka z dostępem do rzeki idealna dla wędkarzy! Raj dla miłośników przyrody i spokoju nad wodą.",
        "Działka rolno-budowlana z możliwością podziału! Elastyczna opcja dla prowadzenia działalności rolniczej lub budowy domu.",
        "Działka na terenie parku krajobrazowego z zachowaną przyrodą! Idealna harmonia z naturą w ekologicznym domu.",
        "Działka z licznymi drzewami owocowymi i nasadzeniami! Sprzyja samowystarczalnemu trybowi życia i zdrowemu odżywianiu.",
        "Działka z warzywnikiem i szklarnią! Doskonałe warunki do uprawy warzyw i owoców przez cały rok.",
        "Działka nadmorska z dostępem do plaży! Wymarzone warunki dla miłośników życia nad wodą.",
        "Działka pod uprawy sadownicze lub winnice! Atrakcyjna propozycja dla osób zainteresowanych rolnictwem.",
        "Działka rekreacyjna z budynkiem gospodarczym! Zapewnia mnóstwo możliwości do relaksu i aktywnego spędzania czasu na świeżym powietrzu.",
        "Działka w okolicy z potencjałem turystycznym! Idealna inwestycja dla przedsiębiorców zainteresowanych sektorem turystycznym.",
    ];
    $stan = ["do remontu", "po remoncie", "w budowie", "nowy", "opuszczony"];
    $pracownicy = [5,18,38,52,56,69,87,94,115,141,153,167,204,232,235,251,252,258,267,273];
    function getAddress($faker){
        $adres = $faker->address();
        $adres3 = explode(",", $adres); // Podział na [Ulica, kod-pocztowy + miasto]
        $adres2 = explode(" ", $adres3[1]); // Podział na [kod-pocztowy, miasto]
        $str = "";
        $address = "";
        $city = "";
        for($j=2;$j<=count($adres2)-1;++$j){
            $city .= $adres2[$j];
            if($j != count($adres2) - 1){
                $city .= " ";
            }
        } // miasto
        for($j=0;$j<count($adres3) - 1;++$j){
            $address .= $adres3[0];
            if($j != count($adres3) - 2){
                $address .= ",";
            }
        } // adres
        $str .= $address." ".$adres2[1]." ".$city; // kod pocztowy
        return $str;
    }

    for($i=0;$i<423;++$i){
        $faker = Faker\Factory::create("pl_PL");
        echo "<div style='display:flex;'>";
            $str = "";
            $str .= ($i + 1).","; // inkrementacja
            $type = rand(1,3);
            $str .= $types[$type-1].","; // typ
            switch($type){
                case 1:
                    $str .= '"'.$opisy_budynek[rand(0,9)].'"'.","; // opis
                    break;
                case 2:
                    $str .= '"'.$opisy_dzialki[rand(0,14)].'"'.","; // opis
                    break;
                case 3:
                    $str .= '"'.$opisy_lokale[rand(0,9)].'"'.","; // opis
                    break;
            }
            $adres = getAddress($faker);
            $str .= $adres.","; // adres
            $str .= $faker->numberBetween(375000, 1300000).","; // cena
            $str .= $faker->numberBetween(25, 354).","; // powierzchnia
            $str .= $stan[rand(0,4)].","; // powierzchnia
            $str .= $pracownicy[rand(0,19)]; // id_pracownika

            echo $str;
        echo "</div>";
    }
    ?>
</body>
</html>