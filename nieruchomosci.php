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
        "Przestronne mieszkanie z widokiem na park! To piękne mieszkanie o powierzchni 80 metrów kwadratowych znajduje się w spokojnej okolicy zaledwie kilka kroków od pięknego parku. Duże okna zapewniają obfite światło słoneczne, a z balkonu można podziwiać widok na zielone drzewa i kwitnące kwiaty. Idealne miejsce dla miłośników przyrody i spokoju.",
        "Nowoczesny apartament w centrum miasta! Ten elegancki apartament o powierzchni 60 metrów kwadratowych jest położony w samym sercu miasta, w bezpośrednim sąsiedztwie restauracji, sklepów i lokalnych atrakcji. Wyposażony w nowoczesne udogodnienia, takie jak klimatyzacja i inteligentny system domowy, ten apartament zapewnia komfortowe życie w dynamicznym otoczeniu miejskim.",
        "Uroczy dom z ogrodem i tarasem! Ten uroczy dom zlokalizowany na przedmieściach oferuje wyjątkową harmonię między przytulnością domowego ogniska, a możliwościami relaksu na świeżym powietrzu. Z ogrodu pełnego kwiatów i zieleni można wyjść na przestronny taras, idealny na rodzinne grillowanie czy wieczorne spotkania z przyjaciółmi.",
        "Ekskluzywna rezydencja z basenem! Ta ekskluzywna rezydencja o powierzchni 300 metrów kwadratowych oferuje luksusowy styl życia w otoczeniu prywatnego ogrodu z basenem. Z wyjątkowym wzornictwem, najwyższej jakości wykończeniami i panoramicznymi widokami na okolicę, ta posiadłość spełnia najwyższe oczekiwania klientów poszukujących wyjątkowej nieruchomości.",
        "Kamienica z klimatem w historycznym centrum! Ta pięknie odrestaurowana kamienica zlokalizowana w historycznym centrum miasta to idealne połączenie uroku z nowoczesnym komfortem. Oryginalne drewniane belki stropowe, kute balustrady i antyczne meble nadają temu miejscu niepowtarzalny klimat, który przyciąga miłośników historii i estetyki.",
        "Przestronny dom rodzinny z wielkim ogrodem! Ten przestronny dom o powierzchni 200 metrów kwadratowych oferuje doskonałą przestrzeń dla całej rodziny. Z dużym salonem, jasną kuchnią, czterema sypialniami i przestronnym ogrodem, ten dom zapewnia idealne warunki do wspólnego życia i relaksu na świeżym powietrzu.",
        "Stylowa loftowa przestrzeń w fabrycznym budynku! Ta unikatowa loftowa przestrzeń zlokalizowana w odrestaurowanym fabrycznym budynku łączy w sobie industrialny charakter z nowoczesnym stylem. Wysokie sufity, duże okna i otwarta koncepcja przestrzeni tworzą unikatową atmosferę, idealną dla osób poszukujących nietuzinkowych mieszkań.",
        "Elegancka willa z panoramicznym widokiem na morze! Ta elegancka willa zlokalizowana na wybrzeżu oferuje spektakularny widok na morze oraz dostęp do prywatnej plaży. Z przestronnymi tarasami, luksusowym wyposażeniem i bezpośrednim dostępem do wody, ta nieruchomość stanowi idealne miejsce dla miłośników luksusu i relaksu nad brzegiem oceanu.",
        "Apartament z widokiem na góry i jezioro! Ten urokliwy apartament położony na wzgórzu oferuje niezapomniane widoki na otaczające go góry i jezioro. Z balkonu można podziwiać wschody i zachody słońca nad malowniczym krajobrazem, co czyni to miejsce idealnym dla miłośników przyrody i spokoju.",
        "Komfortowy dom w otoczeniu lasu! Ten komfortowy dom położony w otoczeniu lasu oferuje doskonałą harmonię między ciszą natury a nowoczesnym komfortem. Z dużymi oknami, tarasem z widokiem na drzewa i przytulnym kominkiem, ten dom stanowi idealne schronienie dla osób poszukujących spokoju i kontaktu z przyrodą."
    ];
    $opisy_lokale = [
        "Przytulna kawiarnia w sercu miasta! Ta przytulna kawiarnia o urokliwym wystroju i miłej atmosferze znajduje się w samym sercu miasta, co czyni ją idealnym miejscem na spotkania z przyjaciółmi czy relaksujące popołudnie przy filiżance aromatycznej kawy.",
        "Nowoczesny biurowiec z dogodną lokalizacją! Ten nowoczesny biurowiec oferuje wysokiej jakości biura zlokalizowane w prestiżowej dzielnicy biznesowej. Z dogodnym dostępem do transportu publicznego i bogatą infrastrukturą, ten budynek stanowi idealne miejsce dla firm poszukujących profesjonalnej przestrzeni biurowej.",
        "Stylowy salon fryzjerski z pełnym wyposażeniem! Ten stylowy salon fryzjerski oferuje pełen zakres usług fryzjerskich i kosmetycznych w eleganckim i przyjemnym otoczeniu. Z wysokiej jakości sprzętem i doświadczonym personelem, ten salon zapewnia swoim klientom luksusowe doświadczenie pielęgnacyjne.",
        "Przestronny lokal handlowy z dużymi witrynami! Ten przestronny lokal handlowy z dużymi witrynami znajduje się w ruchliwej części miasta, co zapewnia duży ruch klientów i doskonałą widoczność dla firm. Z elastyczną przestrzenią i możliwością dowolnej aranżacji, ten lokal stanowi idealne miejsce dla różnorodnych przedsiębiorstw.",
        "Klimatyczna restauracja z ogródkiem letnim! Ta klimatyczna restauracja zlokalizowana w historycznym budynku oferuje wykwintną kuchnię i przytulną atmosferę. Z pięknym ogródkiem letnim, idealnym na romantyczne kolacje pod gwiazdami, ta restauracja przyciąga zarówno lokalnych mieszkańców, jak i turystów.",
        "Nowoczesne studio fitness z bogatą ofertą zajęć! To nowoczesne studio fitness oferuje bogatą ofertę zajęć prowadzonych przez doświadczonych instruktorów. Z wysokiej jakości sprzętem, indywidualnym podejściem do klienta i przyjazną atmosferą, to miejsce staje się ulubionym miejscem aktywności dla wielu osób.",
        "Ekskluzywny butik z designerskimi ubraniami! Ten ekskluzywny butik oferuje kolekcje designerskich ubrań i akcesoriów dla klientów poszukujących wyjątkowych i luksusowych produktów. Z eleganckim wystrojem wnętrza i profesjonalną obsługą, ten butik zapewnia swoim klientom niezapomniane doświadczenie zakupowe.",
        "Kreatywne biuro coworkingowe dla freelancerów! To kreatywne biuro coworkingowe oferuje elastyczną przestrzeń pracy dla freelancerów i małych firm. Z wygodnymi biurami, szybkim internetem i inspirującą atmosferą, to miejsce sprzyja efektywnej pracy i wymianie pomysłów.",
        "Przyjazny klub fitness dla całej rodziny! Ten przyjazny klub fitness oferuje bogatą ofertę zajęć i udogodnień dla całej rodziny. Z basenem, siłownią, salami do grupowych zajęć i opieką nad dziećmi, ten klub zapewnia rozrywkę i aktywność dla wszystkich członków rodziny.",
        "Nowoczesny gabinet medyczny z kompleksową opieką! Ten nowoczesny gabinet medyczny oferuje kompleksową opiekę zdrowotną w przyjaznej i profesjonalnej atmosferze. Z doświadczonym personelem medycznym, najnowszym sprzętem diagnostycznym i szeroką gamą usług, ten gabinet stanowi pewne miejsce dla pacjentów poszukujących wysokiej jakości opieki medycznej."
    ];
    $opisy_dzialki = [
        "Urokliwa działka nad jeziorem z prywatnym dostępem do wody! Ta urokliwa działka o powierzchni 1000 metrów kwadratowych znajduje się nad brzegiem malowniczego jeziora, oferując swoim właścicielom nieograniczone możliwości relaksu i rekreacji. Z prywatnym dostępem do wody i pięknymi widokami na okolicę, ta działka stanowi idealne miejsce na budowę domu letniskowego lub całorocznego.",
        "Rozległa działka rolna w otoczeniu pól i łąk! Ta rozległa działka rolna o powierzchni 5 hektarów położona jest w spokojnej wiejskiej okolicy, otoczona zielenią pól i łąk. Z doskonałymi warunkami do uprawy roślin lub hodowli zwierząt, ta działka zapewnia możliwość rozwoju rolniczego lub stworzenia własnego gospodarstwa.",
        "Malownicza działka leśna w górach! Ta malownicza działka o powierzchni 2 hektarów położona jest w sercu górskiego lasu, otoczona ciszą natury i dziką fauną. Z dostępem do szlaków turystycznych i możliwością budowy domu letniskowego lub chaty, ta działka stanowi raj dla miłośników przyrody i spokoju.",
        "Działka rekreacyjna z sadem owocowym! Ta działka rekreacyjna o powierzchni 5000 metrów kwadratowych oferuje nie tylko piękne widoki na okolicę, ale także własny sad owocowy z różnorodnymi drzewami. Idealna na spędzanie czasu na świeżym powietrzu i zbieranie świeżych owoców prosto z własnego ogrodu.",
        "Działka budowlana z widokiem na góry! Ta działka budowlana o powierzchni 800 metrów kwadratowych znajduje się na zboczu góry, co zapewnia niesamowite widoki na otaczające krajobrazy. Z możliwością budowy domu marzeń z panoramicznymi oknami i przestronnym tarasem, ta działka jest idealnym miejscem dla osób poszukujących spokoju i piękna natury.",
        "Działka w rejonie turystycznym z potencjałem inwestycyjnym! Ta działka o powierzchni 3 hektarów położona jest w popularnym rejonie turystycznym, co czyni ją doskonałą opcją inwestycyjną. Z możliwością budowy ośrodka wypoczynkowego, pensjonatu lub kompleksu rekreacyjnego, ta działka przyciąga uwagę osób szukających okazji biznesowych w branży turystycznej.",
        "Działka z dostępem do rzeki idealna dla miłośników wędkarstwa! Ta działka o powierzchni 1500 metrów kwadratowych znajduje się nad brzegiem spokojnej rzeki, oferując doskonałe warunki do uprawiania wędkarstwa i relaksu nad wodą. Z prywatnym pomostem i dostępem do łodzi, ta działka stanowi raj dla miłośników przyrody i spokoju.",
        "Działka rolno-budowlana z możliwością podziału! Ta działka o powierzchni 1,5 hektara oferuje doskonałą kombinację gruntów rolnych i budowlanych, co daje możliwość zarówno prowadzenia działalności rolniczej, jak i budowy domu mieszkalnego lub letniskowego. Z potencjałem podziału na mniejsze parcele, ta działka stanowi elastyczną opcję dla różnych celów.",
        "Działka na terenie parku krajobrazowego z zachowaną przyrodą! Ta działka o powierzchni 4 hektarów położona jest na terenie parku krajobrazowego, otoczona bujną roślinnością i zachowaną przyrodą. Z możliwością budowy ekologicznego domu zgodnego z zasadami ochrony środowiska, ta działka jest idealnym miejscem dla osób poszukujących harmonii z naturą.",
        "Działka z licznymi drzewami owocowymi i nasadzeniami! Ta działka o powierzchni 3000 metrów kwadratowych charakteryzuje się bogatym nasadzeniem drzew owocowych, takich jak jabłonie, śliwy i grusze, co zapewnia obfitość świeżych owoców dla jej właścicieli. Z możliwością założenia własnego ogrodu warzywnego, ta działka sprzyja samowystarczalnemu trybowi życia i zdrowemu odżywianiu.",
        "Działka z warzywnikiem i szklarnią! Ta działka rolna o powierzchni 2 hektarów posiada już działający warzywnik i szklarnię, co zapewnia doskonałe warunki do uprawy warzyw i owoców przez cały rok. Z możliwością rozwoju działalności rolniczej i dostarczania świeżych produktów lokalnej społeczności, ta działka stanowi świetną inwestycję dla osób zainteresowanych rolnictwem.",
        "Działka nadmorska z dostępem do plaży! Ta działka o powierzchni 500 metrów kwadratowych znajduje się tuż przy wybrzeżu, oferując swoim właścicielom bezpośredni dostęp do plaży i morza. Z możliwością budowy domu letniskowego z widokiem na falujące fale i złociste piaski, ta działka zapewnia wymarzone warunki dla miłośników życia nad wodą.",
        "Działka pod uprawy sadownicze lub winnice! Ta działka o powierzchni 3 hektarów posiada doskonałe warunki do uprawy sadów owocowych lub winnic, dzięki swojej żyznej glebie i korzystnemu mikroklimatowi. Z możliwością rozwoju gospodarstwa rolniczego i produkcji zdrowych i wysokiej jakości produktów, ta działka stanowi atrakcyjną propozycję dla osób zainteresowanych rolnictwem.",
        "Działka rekreacyjna z budynkiem gospodarczym! Ta działka rekreacyjna o powierzchni 1 hektara wyposażona jest w budynek gospodarczy, który można wykorzystać do przechowywania narzędzi ogrodniczych lub sprzętu rekreacyjnego. Z możliwością założenia ogrodu rekreacyjnego lub mini-farmy, ta działka zapewnia mnóstwo możliwości do relaksu i aktywnego spędzania czasu na świeżym powietrzu.",
        "Działka w okolicy z potencjałem turystycznym! Ta działka o powierzchni 2 hektarów znajduje się w okolicy o dużym potencjale turystycznym, co czyni ją idealną inwestycją dla osób zainteresowanych branżą turystyczną. Z możliwością budowy pensjonatu, ośrodka wypoczynkowego lub domków letniskowych, ta działka przyciąga uwagę przedsiębiorców poszukujących okazji inwestycyjnych w sektorze turystycznym."
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