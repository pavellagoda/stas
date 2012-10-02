<?php


/**
 * structure for RSS feeds
 *
 * @author Ivan
 */
class RSS {
    public static $aTravelBlogs = array(
        'en'=>array(
//                'http://www.travelblog.org/rss/latest.xml',
//                'http://www.letsgo.com/posts/rss',
            'http://feeds.feedburner.com/EverythingEverywhere?format=xml',
            'http://feeds.globetrooper.com/globetrooper?format=xml',
            'http://feeds.feedburner.com/RockyAustraliaTravelGuide?format=xml',
            'http://feeds.feedburner.com/wanderingtrader?format=xml',
            'http://feeds.feedburner.com/ViatorTravelBlog',
        ),
        'br'=>array(
//                'http://www.travelblog.org/rss/latest.xml',
//                'http://www.letsgo.com/posts/rss',
            'http://feeds.feedburner.com/EverythingEverywhere?format=xml',
            'http://feeds.globetrooper.com/globetrooper?format=xml',
            'http://feeds.feedburner.com/RockyAustraliaTravelGuide?format=xml',
            'http://feeds.feedburner.com/wanderingtrader?format=xml',
            'http://feeds.feedburner.com/ViatorTravelBlog',
        ),
        'sa'=>array(
//                'http://www.travelblog.org/rss/latest.xml',
//                'http://www.letsgo.com/posts/rss',
            'http://feeds.feedburner.com/EverythingEverywhere?format=xml',
            'http://feeds.globetrooper.com/globetrooper?format=xml',
            'http://feeds.feedburner.com/RockyAustraliaTravelGuide?format=xml',
            'http://feeds.feedburner.com/wanderingtrader?format=xml',
            'http://feeds.feedburner.com/ViatorTravelBlog',
        ),
        'it'=>array(
            'http://www.viaggiaresponsabile.info/feed/',
            'http://www.godivaviaggi.it/feed/',
            'http://www.viaggioblog.it/blog/feed/',
            'http://feeds.feedburner.com/Viaggioadagioit-IlBlogDiViaggioIndipendente',
            'http://www.backpacker.it/feed',
            'http://feeds.feedburner.com/tripwolf_IT?format=xml',
        ),
        'fr'=>array(
            'http://feeds.feedburner.com/LeCarnetDeVoyageDunJeuneGlobetrotter?format=xml',
            'http://feeds.feedburner.com/tofetmel?format=xml',
        ),
        'es'=>array(
            'http://feeds.weblogssl.com/diariodelviajero?format=xml',                
            'http://www.viajerosporelmundo.com/feed/',
            'http://www.diariodeviajes.es/feed/rss',
            'http://feeds.feedburner.com/chavetas',
            'http://www.abc.es/blogs/viajar/feedrss.asp',
        ),
        'de'=>array(
            'http://reisebloggerwelt.de/feed/',
            'http://blog.reisen-experten.de/feed',
            'http://feeds2.feedburner.com/mytraveltips',
            'http://blog.bildergallery.com/feed',
            'http://feeds.feedburner.com/DasStaTravelBlog?format=xml',
            'http://reise.germanblogs.de/feed',
        ),
    );


    public static $aDestinationsFeeds = array(
        'en'=>array(
            'africa'=>array(
                'http://feeds.bootsnall.com/bna/Africatravelguide',
                'http://africatravelguide.org/feed/',
                'http://www.guideafrica.com/feed',
            ),
            'asia'=>array(
                'http://www.lonelyplanet.com/tonywheeler/index.xml',
            ),
            'australia'=>array(
                
            ),
            'europe'=>array(
                'http://0.tqn.com/6/g/goeurope/b/rss2.xml',
                'http://feeds.feedburner.com/Europeupclose?format=xml',
            ),
            'latinamerica'=>array(
                
            ),
            'northamerica'=>array(
                
            ),
        ),
        'fr'=>array(
            'africa'=>array(
                'http://allafrica.com/tools/headlines/rdf/africa/headlines.rdf',
                'http://www.tv5.org/data/tv5/rss/rssjtafrique.xml',
                'http://www.rue89.com/afrique/feed',
            ),
            'asia'=>array(
                'http://feeds.feedburner.com/ChineInformations',
                'http://www.rue89.com/asie/feed',
                'http://feeds.feedburner.com/lagrandeepoque',
            ),
            'australia'=>array(
                'http://www.guidesulysse.com/communiques/rss-nouveautes-derniere-semaine.xml',
            ),
            'europe'=>array(
                'http://www.rue89.com/europe/feed',
                'http://www.slovenia.info/rss/stiprssmain5.xml',
            ),
            'latinamerica'=>array(
                'http://www.voyage-amerique.fr/feed/',
                'http://www.rue89.com/amerique-latine/feed',
            ),
            'northamerica'=>array(
                'http://www.voyage-amerique.fr/feed/',
                'http://fr.voyagepedia.org/rss-destinations.xml',
            ),
        ),
        'de'=>array(
            'africa'=>array(
                'http://www.nahfernreisen.de/kontinent/afrika/feed/',
                'http://www.topreiseziele.de/reiseziele/afrika/feed/',
            ),
            'asia'=>array(
                'http://www.nahfernreisen.de/kontinent/asien/feed/',
                'http://www.topreiseziele.de/reiseziele/asien/feed/',
            ),
            'australia'=>array(
                'http://www.nahfernreisen.de/kontinent/ozeanien/feed/',
                'http://www.topreiseziele.de/reiseziele/australien/feed/',
            ),
            'europe'=>array(
                'http://www.nahfernreisen.de/kontinent/europa/feed/',
                'http://www.topreiseziele.de/reiseziele/europa/feed/',
            ),
            'latinamerica'=>array(
                'http://www.nahfernreisen.de/kontinent/amerika/feed/',
            ),
            'northamerica'=>array(
                'http://www.nahfernreisen.de/kontinent/amerika/feed/',
                'http://www.topreiseziele.de/reiseziele/nord-mittelamerika/feed/',
            ),
        ),
        'it'=>array(
            'africa'=>array(
                'http://www.zingarate.com/feed/destinazioni/africa/',
                'http://www.africa.it/feed',                
            ),
            'asia'=>array(
                'http://www.zingarate.com/feed/destinazioni/asia/',
            ),
            'australia'=>array(
                'http://www.zingarate.com/feed/destinazioni/oceania/',
            ),
            'europe'=>array(
                'http://www.zingarate.com/feed/destinazioni/europa/',
            ),
            'latinamerica'=>array(
                'http://news.ilviaggio.it/feed/',
                'http://www.zingarate.com/feed/destinazioni/sud-america/',
            ),
            'northamerica'=>array(
                'http://www.myusa.it/guida-stati-uniti.feed?type=rss',
                'http://www.zingarate.com/feed/destinazioni/nord-america/',
            ),
        ),
        'es'=>array(
            'africa'=>array(
                'http://www.utilidad.com/taxonomy/term/180/all/feed',
            ),
            'asia'=>array(
                'http://asiaviaje.com/feed/',
                'http://www.utilidad.com/taxonomy/term/181/all/feed',
            ),
            'australia'=>array(
                'http://www.utilidad.com/taxonomy/term/182/all/feed',
            ),
            'europe'=>array(
                'http://www.utilidad.com/taxonomy/term/183/all/feed',
            ),
            'latinamerica'=>array(
                'http://www.utilidad.com/taxonomy/term/184/all/feed',
            ),
            'northamerica'=>array(
                'http://www.utilidad.com/taxonomy/term/185/all/feed',
            ),
        ),
        
        'br'=>array(
            'africa'=>array(
                'http://feeds.bootsnall.com/bna/Africatravelguide',
                'http://africatravelguide.org/feed/',
                'http://www.guideafrica.com/feed',
            ),
            'asia'=>array(
                'http://www.lonelyplanet.com/tonywheeler/index.xml',
            ),
            'australia'=>array(
                
            ),
            'europe'=>array(
                'http://0.tqn.com/6/g/goeurope/b/rss2.xml',
                'http://feeds.feedburner.com/Europeupclose?format=xml',
            ),
            'latinamerica'=>array(
                
            ),
            'northamerica'=>array(
                
            ),
        ),
        'sa'=>array(
            'africa'=>array(
                'http://feeds.bootsnall.com/bna/Africatravelguide',
                'http://africatravelguide.org/feed/',
                'http://www.guideafrica.com/feed',
            ),
            'asia'=>array(
                'http://www.lonelyplanet.com/tonywheeler/index.xml',
            ),
            'australia'=>array(
                
            ),
            'europe'=>array(
                'http://0.tqn.com/6/g/goeurope/b/rss2.xml',
                'http://feeds.feedburner.com/Europeupclose?format=xml',
            ),
            'latinamerica'=>array(
                
            ),
            'northamerica'=>array(
                
            ),
        ),
    );
    
    public static $destinationDescriptions = 
        array(
            'en'=>array(
                'africa' => 'Do you wish to visit the Black continent with a group or perhaps you prefer a private guided tour? Find a safari tour in Namibia, a relaxing stay in Kenya or a cruise down the Nile river in Egypt. Using our travel portal you’ll book the right package for any budget or travel need and you’ll be able to reserve your hotel, car and tour easily online.',
                'asia' => 'Come discover the enchanting destinations Asia has to offer: Thailand, China, Japan, South Korea and many more offered by our wide range of tour operators and travel agencies. Compare the prices and find the right offer for you by browsing resorts, tours, travel deals and last minute vacation offers.',
                'australia' => 'Are you looking for an adventure tour of Australia or perhaps you wish to plan your honeymoon in the Pacific Islands? Do you want to relax on the beach and take advantage of an all-inclusive hotel or perhaps you’d like to go on a cruise? Choose among thousands of selected offers and tailor your perfect vacation in our portal.',
                'europe' => 'Browse thousands of travel deals and find the one you are looking for: Europe is waiting for you! Whether you choose to explore it on your own by renting a car and booking delightful B&Bs or you’d rather prefer to join a guided tour and stay in a hotel here you’ll find what you need to make your trip around Europe an unforgettable one.',
                'latinamerica' => 'Choose to visit colorful Brazil, exciting Chile or adventurous Peru for your next holiday or perhaps take a cruise in the Caribbean or go see a tango show in Argentina. Discover South and Central America with us and find discount prices on thousands of different activities, hotels, fly and drive packages, cruises and tours.',
                'northamerica' => 'ave you always dreamed to go on a coast-to-coast tour of the USA or you wish to take the panoramic train across Canada? Find out how to easily book the best tours and travel packages through our reliable and affordable tour operators and travel agencies. Read other travelers reviews and get informed before you go so you won’t miss anything!',
            ),
            'fr'=>array(
                'africa' => 'Vous souhaitez visiter le continent noir avec un groupe ou peut-être vous préférez une visite guidée privée? Trouvez un safari en Namibie, un séjour de détente au Kenya ou une croisière sur le Nil en Egypte. Grâce à notre portail de voyage vous réservez le forfait adapté à tous les budgets ou les besoins et réserver votre hôtel, voiture et tour facilement en ligne.',
                'asia' => "Venez découvrir les destinations que l’Asie a à offrir: la Thaïlande, la Chine, le Japon, la Corée du Sud et plus de la notre large gamme de tour operator et agences de voyage. Comparez les prix et trouvez l'offre qui vous convient: excursions, offres de voyages et dernière minute.",
                'australia' => "Vous êtes à la recherche d'un voyage d'aventure en Australie ou peut-être que vous souhaitez planifier votre lune de miel dans les îles du Pacifique? Voulez-vous vous détendre sur la plage et profiter d'un hôtel tout compris ou peut-être que vous aimeriez faire une croisière? Choisissez parmi des milliers d'offres sélectionnées dans notre portail.",
                'europe' => "Consultez des milliers d'offres de voyage et trouvez celle que vous recherchez: l'Europe vous attend! Que vous choisissiez de la découvrir par vous-même en louant une voiture et en réservant un charmant B & B ou que vous préfériez vous joindre à une visite guidée, ici vous trouverez tout ce dont vous avez besoin pour rendre votre voyage en Europe inoubliable.",
                'latinamerica' => 'Choisissez de visiter le charmant Brésil, le passionnant Chili ou l’aventureux Pérou pour vos vacances ou peut-être faite une croisière aux Caraïbes ou allez voir un spectacle de tango en Argentine. Découvrez l’Amérique central et du sud avec nous et trouverez prix discount sur des milliers de différentes activités, hôtels, forfaits fly and drive et croisières.',
                'northamerica' => 'Avez-vous toujours rêvé de faire un tour côte-à-côte aux Etats-Unis ou vous souhaitez prendre le train panoramique à travers le Canada? Découvrez comment facilement réserver les meilleurs tours et forfaits touristiques grâce à nos tour-opérateurs fiables et abordables et nos agences de voyage. Lisez les critiques de voyageurs et informez-vous avant de partir!',
            ),
            'de'=>array(
                'africa' => 'Möchten Sie den schwarzen Kontinent in einer Gruppe oder mit einer privat geführten Tour erkunden? Finden Sie jetzt eine Safari in Namibia, einen erholsamen Urlaub in Kenia oder eine Kreuzfahrt auf dem Nil. Mit unserem Reiseportal buchen Sie immer das richtige Angebot für Ihr Budget und Ihre Wünsche. Hotel, Auto oder Tour können Sie dann einfach online buchen.',
                'asia' => 'Entdecken Sie die phantastischen Ziele die Asien zu bieten hat: Thailand, China, Japan, Süd- Korea und viele andere. Angeboten von einem großen Angebot an Reiseführern und Agenturen. Vergleichen Sie die Preise und finden Sie das richtige Angebot für sich indem Sie durch Resorts, Touren, Reise- und Last- Minute- Angebote stöbern.',
                'australia' => 'Suchen Sie nach einer Abenteuertour in Australien oder planen Sie Flitterwochen auf den Pazifischen Inseln? Möchten Sie sich an einem Strand entspannen und die Vorteile eines All- Inclusive Hotels genießen oder lieber auf eine Kreuzfahrt gehen? Indem Sie aus tausenden Angeboten auswählen können, stellen Sie sich bei uns ganz einfach Ihren Traumurlaub zusammen.',
                'europe' => 'Durchstöbern Sie tausende von Reiseangeboten und finden Sie das wonach Sie suchen: Europa wartet auf Sie! Egal ob Sie lieber ein Auto und B&Bs mieten, um Europa selbständig zu entdecken oder ob Sie lieber eine geführte Tour und eine Unterkunft in einem Hotel bevorzugen. Bei uns finden Sie alles was Ihre Europareise unvergesslich macht.',
                'latinamerica' => 'Besuchen Sie das farbenreiche Brasilien, das aufregende Chile oder das abenteuerliche Peru.  Gehen Sie auf eine Kreuzfahrt in der Karibik oder sehen Sie eine Tango Show in Argentinien. Entdecken Sie Süd- und Zentral -Amerika mit uns und finden Sie die besten Preise für tausende von verschiedenen Aktivitäten, Flüge, Hotels, Autos, Kreuzfahrten und Touren.',
                'northamerica' => 'Haben Sie immer davon geträumt eine Reise durch die USA zu machen oder möchten Sie per Bahn durch Canada fahren? Stellen Sie fest wie einfach es ist die besten Touren und Reisepakete mit unseren vertrauenswürdigen und günstigen  Reiseagenturen und Tourveranstaltern zu buchen. Lesen Sie die Bewertungen von anderen Reisenden, damit Sie nichts verpassen.',
            ),
            'it'=>array(
                'africa' => 'Vuoi visitare il continente nero con un gruppo o forse preferisci una guida privata? Trova un tour con safari in Namibia, un rilassante soggiorno in Kenya o una crociera lungo il Nilo in Egitto. Utilizzando il nostro portale di viaggi puoi prenotare il pacchetto giusto per ogni esigenza di viaggio o di budget e sarai in grado di prenotare il tuo hotel e tour qui.',
                'asia' => "Vieni a scoprire le incantevoli destinazioni che l’Asia ha da offrire: Tailandia, Cina, Giappone, Corea del Sud e molte altre offerte che troverai offerte dalla nostra vasta gamma di tour operator e agenzie di viaggio. Confronta i prezzi e troverai l'offerta giusta per te: viaggi, crociere e anche last minute.",
                'australia' => "Sei alla ricerca di un’avventura in Australia o forse desideri pianificare la vostra luna di miele nelle isole del Pacifico? Volete rilassarvi sulla spiaggia e usufruire di un hotel all-inclusive o forse ti piacerebbe andare in crociera? Scegli tra migliaia di offerte selezionate e personalizza la tua vacanza nel nostro portale.",
                'europe' => "Guarda migliaia di offerte di viaggio e trova quello che stai cercando: l'Europa ti aspetta! Sia che tu scelga di esplorarla da solo in auto a noleggio prenotando deliziosi B & B o che preferisci partire con un tour guidato e soggiornare in hotel, qui troverai quello che ti serve per rendere il tuo viaggio in Europa indimenticabile .",
                'latinamerica' => "Scegli di visitare il colorato Brasile, l’emozionante Cile o l’avventuroso Perù per la tua prossima vacanza o magari concediti una crociera nei Caraibi o uno spettacolo di tango in Argentina. Scopri il Sud e Centro America con noi e trova migliaia di attività, hotel, pacchetti fly and drive, crociere e tour.",
                'northamerica' => "Hai sempre sognato di fare un tour coast-to-coast negli Stati Uniti o desideri prendere il treno panoramico attraverso il Canada? Scopri come prenotare facilmente i migliori tour e pacchetti di viaggio attraverso i nostri tour operator affidabili e convenienti e le agenzie di viaggio. Leggi le recensioni di chi viaggia e informati prima di partire!",
            ),
            'es'=>array(
                'africa' => '¿Desea visitar el continente Negro con un grupo o tal vez prefiere una visita guiada privada? Encuentre un safari en Namibia, una relajante estancia en Kenia o un crucero por el río Nilo en Egipto. Usando nuestro portal de viajes puede reservar el paquete adecuado para cualquier presupuesto y podrá reservar su hotel, coche y tour en línea.',
                'asia' => 'Venga a descubrir los destinos encantadores de Asia: Tailandia, China, Japón, Corea del Sur y muchos más ofrecidos por nuestra amplia gama de operadores de turismo y agencias de viajes. Compare los precios y encontre la oferta adecuada para usted: excursiones, viajes, cruceros y ofertas de ultimo minuto.',
                'australia' => '¿Está buscando un tour aventura en Australia o quizás usted desea planear su luna de miel en las islas del Pacífico? ¿Desea relajarse en la playa y disfrutar de un hotel con todo incluido o tal vez le gustaría ir en un crucero? Elija entre miles de ofertas seleccionadas y encuentre sus vacaciones perfectas en nuestro portal.',
                'europe' => 'Busque entre miles de ofertas de viajes y encontre lo que usted está buscando: Europa está esperando! Ya sea que usted elija para explorar por su cuenta alquilando un coche y reservando B & B o que prefieren unirse a una visita guiada con estancia en hotel, aquí encontrará lo que necesita para un viaje inolvidable por Europa.',
                'latinamerica' => '¿Siempre ha soñado con ir en un viaje de costa a costa en los EE.UU. o desea tomar el tren panorámico a través de Canadá? Para saber cómo reservar fácilmente los mejores tours y paquetes de viaje visite nuestros operadores turísticos y agencias de viajes. Ahora puede leer los comentarios de otros viajeros antes de ir!',
                'northamerica' => '',
            ),

            'br'=>array(
                'africa' => 'Do you wish to visit the Black continent with a group or perhaps you prefer a private guided tour? Find a safari tour in Namibia, a relaxing stay in Kenya or a cruise down the Nile river in Egypt. Using our travel portal you’ll book the right package for any budget or travel need and you’ll be able to reserve your hotel, car and tour easily online.',
                'asia' => 'Come discover the enchanting destinations Asia has to offer: Thailand, China, Japan, South Korea and many more offered by our wide range of tour operators and travel agencies. Compare the prices and find the right offer for you by browsing resorts, tours, travel deals and last minute vacation offers.',
                'australia' => 'Are you looking for an adventure tour of Australia or perhaps you wish to plan your honeymoon in the Pacific Islands? Do you want to relax on the beach and take advantage of an all-inclusive hotel or perhaps you’d like to go on a cruise? Choose among thousands of selected offers and tailor your perfect vacation in our portal.',
                'europe' => 'Browse thousands of travel deals and find the one you are looking for: Europe is waiting for you! Whether you choose to explore it on your own by renting a car and booking delightful B&Bs or you’d rather prefer to join a guided tour and stay in a hotel here you’ll find what you need to make your trip around Europe an unforgettable one.',
                'latinamerica' => 'Choose to visit colorful Brazil, exciting Chile or adventurous Peru for your next holiday or perhaps take a cruise in the Caribbean or go see a tango show in Argentina. Discover South and Central America with us and find discount prices on thousands of different activities, hotels, fly and drive packages, cruises and tours.',
                'northamerica' => 'ave you always dreamed to go on a coast-to-coast tour of the USA or you wish to take the panoramic train across Canada? Find out how to easily book the best tours and travel packages through our reliable and affordable tour operators and travel agencies. Read other travelers reviews and get informed before you go so you won’t miss anything!',
            ),
            
            'sa'=>array(
                'africa' => 'Do you wish to visit the Black continent with a group or perhaps you prefer a private guided tour? Find a safari tour in Namibia, a relaxing stay in Kenya or a cruise down the Nile river in Egypt. Using our travel portal you’ll book the right package for any budget or travel need and you’ll be able to reserve your hotel, car and tour easily online.',
                'asia' => 'Come discover the enchanting destinations Asia has to offer: Thailand, China, Japan, South Korea and many more offered by our wide range of tour operators and travel agencies. Compare the prices and find the right offer for you by browsing resorts, tours, travel deals and last minute vacation offers.',
                'australia' => 'Are you looking for an adventure tour of Australia or perhaps you wish to plan your honeymoon in the Pacific Islands? Do you want to relax on the beach and take advantage of an all-inclusive hotel or perhaps you’d like to go on a cruise? Choose among thousands of selected offers and tailor your perfect vacation in our portal.',
                'europe' => 'Browse thousands of travel deals and find the one you are looking for: Europe is waiting for you! Whether you choose to explore it on your own by renting a car and booking delightful B&Bs or you’d rather prefer to join a guided tour and stay in a hotel here you’ll find what you need to make your trip around Europe an unforgettable one.',
                'latinamerica' => 'Choose to visit colorful Brazil, exciting Chile or adventurous Peru for your next holiday or perhaps take a cruise in the Caribbean or go see a tango show in Argentina. Discover South and Central America with us and find discount prices on thousands of different activities, hotels, fly and drive packages, cruises and tours.',
                'northamerica' => 'ave you always dreamed to go on a coast-to-coast tour of the USA or you wish to take the panoramic train across Canada? Find out how to easily book the best tours and travel packages through our reliable and affordable tour operators and travel agencies. Read other travelers reviews and get informed before you go so you won’t miss anything!',
            ),
        );
    public static function getHolidayLinks($country){
        $aLinks = array(
            'de'=>array(
                'http://www.holidaycheck.de/mitmachen.php'=>'HolidayCheck bietet Hotelbewertungen für Hotels, Reisen & Urlaub. Urlaubsbilder und Reisetipps von Urlaubern helfen bei der Hotelauswahl. Meinungen über Urlaubsziele können im Reiseforum mit anderen Reisenden ausgetauscht werden.',
                'http://check-your-holiday.info/'=>'Check-your-holiday.info ist Ihr unabhängiges Reiseportal und gibt Ihnen Informationen zu den besten Reisezielen , den beliebtesten Reisezielen , zu Insider Reisezielen und vieles mehr. Die hier genannten Reiseziele wurden von uns selbst besucht und die Erfahrungen die wir auf diesen Reisen gemacht haben geben wir hier wieder. Machen Sie sich jetzt ein Bild von Ihrem Urlaubsort!',
                'http://bewertungen.hotelbewertungen.net/'=>'Planen Sie gerade Ihren Urlaub ? Wenn ja, sind Sie bei uns goldrichtig. Hier finden Hotelbewertungen zu Hotels von Urlauber zu Urlauber. Neben den Bewertungen finden Sie mehrere tausend Urlaubsbilder, Reisetipps und Reiseangebote. Hotelbewertungen.Net macht die Reiseplanung zu einem Kinderspiel und hilft Ihnen bei der Suche nach einem günstigen Hotel für Ihren Urlaub.',
                'http://www.tripadvisor.de/'=>'Ob internationale Hotelkette oder elegantes Designhotel, auf TripAdvisor finden Sie ehrliche Bewertungen zu jedem Unterkunftstyp in allen Ländern der Welt. Tipps und wertvolle Hintergrundinformationen Millionen Reisender sind unschätzbare Inspirationsquelle für die eigene Reiseplanung. Verfassen auch Sie eine Bewertung. Reisende wissen Ihre Insiderkenntnisse zu schätzen.',
                'http://www.zoover.de/'=>'Ihren Urlaub auf Zoover planen bedeutet alle wichtigen Informationen und Services aus einer Hand zu bekommen.  Mittlerweile haben Reisende auf Zoover bereits über 1.400.000 Hotelbewertungen geschrieben. Darüber hinaus verfügt Zoover Hotelbewertungen über mehr als 850.000 authentische Urlaubsfotos und Urlaubsvideos.',
                'http://www.hotelkritiken.de/'=>'Hotelkritiken.de ist das unabhängige und kostenfreie Verbraucherportal für deutschsprachigen Hotelgäste, die zu Hotels eine Hotelbewertung lesen oder auch selbst eine Hotelkritik abgeben wollen. Wir erfassen dabei Hotels in mehr als 151 Ländern weltweit. Derzeit finden Sie Hotelbewertungen aus rund 122 Ländern.',
                'http://www.ab-in-den-urlaub.de/hotelbewertungen.htm'=>'Diese Hotelbewertungen sind Bewertungen verschiedenster Urlauber, für ein Hotel, in denen diese einmal übernachtet haben. Die Bewertungen sollen künftigen Urlaubern zeigen, wie gut oder schlecht die dortigen Bedingungen waren.So wollen wir  unentschlossenen Urlaubern, die Entscheidung erleichtern und Fehlentscheidungen  vermeiden lassen. Bewertet werden sehr viele unterschiedliche Aspekte eines Hotels. Machen Sie sich jetzt ein Bild von Ihrem Urlaubsort.',
                'http://www.hotelbeurteilungen.com/'=>'Hotelbeurteilungen und Reisetipps von Urlaubern für Urlauber, ehrlich und objektiv auf Hotelbeurteilungen.com. Lesen Sie Beurteilungen Ihres Hotels oder Urlaubsortes und erleichtern Sie sich so Ihre Entscheidung. Mit uns können Sie auf Nummer sicher gehen wenn es um Ihren perfekten Urlaub geht.',
                'http://www.holidaytube.de/'=>'Hier finden Sie nicht nur interessante Reisetipps und News, sondern auch zahlreiche Hotelbewertungen und Last-Minute Angebote. Bei uns können Sie ihre Erfahrungen mit anderen Urlaubern teilen oder nach Lastminute Reisen und Hotelbewertung suchen. Somit bieten wir die Möglichkeit, sich optimal über den bevorstehenden Urlaub zu informieren.',
                'http://www.wowarstdu.de/hotelbewertungen'=>'Eine Hotelbewertung bietet Ihnen als künftigen Urlauber vor der Buchung einer Unterkunft die Möglichkeit, sich darüber zu informieren, wie andere Gäste den Aufenthalt im entsprechenden Hotel erlebt haben. Hotelbewertungen werden von Reisenden für Reisende verfasst und bewerten die besuchte Unterkunft anhand des persönlichen Eindrucks. Selbstverständlich können die Autoren unseres Hotelbewertungsportals auch Pensionen, Hostels oder Ferienwohnungen auf unserer Webseite bewerten.',
            ),
            'es'=>array(
                'http://www.holidaycheck.es/participate.php'=>'La página te ofrece evaluaciones y descripciones de hoteles en todos los lugares del mundo. Puedes informarte de manera independiente que todas las reseña fueron escritas por la gente que viaja y a que les importa intercambiar sus experiencias como para que tus vacaciones sean un éxito. Brinda con datos útiles que te ayudan en elegir el mejor alojamiento para tí y te invitamos a dejar tus comentarios acerca de tu viaje y del alojamiento que elegiste.',
                'http://www.tripadvisor.es/'=>'TripAdvisor brinda con críticas y opiniones de otros viajeros acerca de hoteles, alquileres y restaurantes, entre otros. El sistema de puntos y las categorías falicitan encontrar justamente el lugar que estás buscando para pasar tus mejores vacaciones. La página también un foro donde puedes intercambiar tus ideas, opiniones y preguntas sobre los lugares con otros viajeros.',
                'http://www.zoover.es/'=>'En Zoover puedes encontrar opiniones y valoraciones de hoteles y destinos hechas por y para viajeros. En Zoover los viajeros han valorado Hoteles, apartamentos, campings, parques turisticos, cruceros, casas de vacaciones y más. Te ayuda a encontrar los campings más apropiados para niños, los mejores hoteles para una visita a una ciudad o hoteles a buen precio. Puedes ver todas las valoraciones en Zoover cuando buscas alojamientos o destinos. Puedes ver además todas las fotos y videos de alojamientos y destinos.',
                'http://www.previaje.com/'=>'Previaje te ayuda planificar bien tu viaje y te ofrece una alta cantidad de categorías para q encuentras las mejores opciones para tí. No importa si estás pensando en irte de vacaciones con tu familia o con tu pareja, Previaje tiene todas las informaciones de todos los lugares acerca de hoteles y sitios interesantes, qué ver y qué hacer, dónde cenar e irse de compras y mucho más.',
                'http://www.muchoviaje.com/Buscador/opiniones.asp'=>'En Muchoviaje usted puede compartir sus opiniones sobre hoteles y destinos en el mundo con otros viajeros. Puede encontrar las ofertas destacadas del momento para hoteles, viajes, cruceros y vuelos y leer informaciones sobre los destinos más populares entre los otros viajeros como usted. Todos los tipos de vacaciones se pueden encontrar ahora en un sólo sitio.',
                'http://es.oyster.com/'=>'Sólo en Oyster usted puede compartir sus fotos de viaje con otros viajeros, escribir su blog y dar su opinión. Busque fotos reales y lea comentarios auténticos para escoger su viaje ideal. Divididas por destino, nuestras fotos muestran sólo lo real porque nuestro sitio dice sólo la verdad y le propone las mejores ofertas.',
            ),
            'it'=>array(
                'http://www.holidaycheck.it/participate.php'=>'Condividete la vostra esperienza di viaggio caricando foto e video della vostra vacanza o dandoci il vostro parere sul vostro hotel. Leggete altre esperienze di viaggio e recensioni da parte di altri viaggiatori come voi. Trovate offerte di viaggio e idee sempre nuove sulle destinazioni che preferite.',
                'http://www.tripadvisor.it/'=>'Se volete trovare un volo, un hotel, un tour oppure il ristorante giusto per quell’occasione speciale potete cercare tra migliaia di opzioni sul nostro sito e vedere le recensioni di altri user o aggiungere la vostra. Troverete inoltre più di 50.000 foto dei luoghi più affascinanti e un forum di viaggio sempre attivo.',
                'http://www.zoover.it/'=>'Sul sito potrete scegliere tra oltre 40.000 destinazioni nel mondo, vedere gli ultimi video e le ultime foto di altri viaggiatori e caricare le vostre. Leggete le recensioni della settimana con il meglio e il peggio nel settore turistico e tenetevi sempre aggiornati sulle ultime novità. Inoltre potrete cercare voli e hotel ai prezzi più convenienti, solo sul nostro sito.',
                'www.recensioni-hotel.it'=>'Collegatevi e troverete recensioni sui migliori hotel in Italia divisi per localita.  Trovate quello che fa per voi e che si adatta al vostro budget e, al vostro ritorno dalle vacanze, aggiungete la vostra e date i vostri consigli ad altri viaggiatori come voi.',
                'www.zingarate.com'=>'Il sito vi offre tutte le informazioni che cercate su tutte le destinazioni del mondo che avete in mente. Notizie aggiornate, recensioni vere, consigli di viaggiatori autentici come voi e molto altro ancora. Voli, offerte, blog e foto caricate da voi che raccontano la vera storia delle mete proposte oltre a trovare consigli utili su cosa fare e vedere nei cinque continenti.',
                'http://viaggi.ciao.it/'=>'Viaggi Ciao vi permette di scrivere le recensioni sugli hotel e dare ad altri viaggiatori consigli di viaggio.  Trovate l’hotel che fa per voi e leggete quello che altri hanno scritto. Le recensioni sono accompagnate da foto veritiere cosi potrete farvi un’idea di cosa vi aspetta per la vostra vacanza. Recensioni divise per destinazione, facili da trovare e divertenti da leggere.',
                'http://www.trivago.it/'=>'Su Trivago potrete trovare recensioni su hotel e scrivere la vostra opinione. Caricate le vostre migliori foto di viaggio ed iscrivetevi gratuitamente per ricevere le ultime notizie, i consigli aggiornati o le ultimissime offerte. Il sito è un motore di ricerca per i vostri viaggi e si collega ad oltre 113 diversi siti di prenotazione per trovare sempre i migliori prezzi sul mercato.',
                'http://it.oyster.com/'=>'Oyster è l’unico sito che vi propone foto veritiere di hotel nel mondo per i viaggiatori e creato da viaggiatori. Unitevi al blog e compartite informazioni di viaggio con altri utenti. Con notizie sempre aggiornate e facile da navigare, Oyster vi suggerisce sempre nuove opzioni per le vostre vacanze e non vi mente mai.',
            ),
            'fr'=>array(
                'http://www.holidaycheck.fr/participate.php'=>"HolidayCheck offre des avis de l'hôtel, photos de voyage et des conseils par des voyageurs, ainsi que des recommandations.Découvrez les photos de vacances authentiques et de vidéos pour avoir une impression. Que votre voix soit entendue par les autres membres de la communauté monHolidayCheck! Envoyer critiques des hôtels, des images et télécharger des vidéos de voyage.",
                'http://www.tripadvisor.fr/'=>"Vous trouverez des critiques véritable hôtel vous pouvez faire confiance à TripAdvisor alors assurez-vous lu les critiques et choisir l'hôtel parfait pour votre prochain séjour. Des millions de voyageurs comme vous ont partagé leurs commentaires honnêtes sur les hôtels, B & B, auberges, et plus encore. Ajouter un commentaire de voyage et d'aider les voyageurs à travers le plan mondial et ontun grand voyage.",
                'http://www.zoover.fr/'=>"Au Zoover, vous pouvez trouver des critiques de vacances par les voyageurs pour les voyageurs. Au Zoover, les voyageurs ont passé en revue les hôtels, appartements, campings, parcs de vacances, croisières, locations de vacances et plus encore. Que dire des meilleurs campings pour les enfants, les meilleurs hôtels pour un voyage de ville ou les hôtels qui sont de bonne valeur pour l'argent? Vous pouvez trouver tous les examens à Zoover lors de la recherche pour le logement ou les destinations.",
                'http://www.routard.com/photos_de_voyage.asp'=>'Partagez vos photos avec les autres voyageurs et trouvez un bon plan d’hôtel sur le site. Plus de 200 destinations et beaucoup de conseils de voyage. Divisés par destination les avis sont faciles à lire et toujours mis à jour. La guide parfaite qui vous dit seulement la vérité.',
                'http://www.vinivi.com/'=>'Sur le site trouverez les avis des milliers de voyageurs sur les séjours et les hôtels que vous cherchez. Toutes les offres voyages du moment et les guide pratique pour vos vacances. Ajoutez la votre au retour de vacances et téléchargez vos meilleures photos. Plus de 12 millions de voyageurs sont partis avec nous et ils ont partagé leurs opinions avec vous.',
                'http://fr.oyster.com/'=>'Le site Oyster vous montre seulement des photos réelles, divisées par destination et partagées d’autres voyageurs comme vous. Faites les meilleurs choix et téléchargéz ici vos photos de voyages après vos vacances. Trouverez ici les dernières nouvelles et les avis d’hôtel toujour mis à jour.',
                'http://fr.hotels.com/'=>"Le site vous permet de réserver des hôtels et de partager vos opinions sur les hôtels et sur vos vacances directement sur Twitter et Facebook. Un choix de plus de 140 000 hôtels à travers le monde et les commentaires authentiques de ceux qui y ont déjà été. Réservez en ligne et connectez vous immédiatement avec d'autres voyageurs.",
            ),
            'en'=>array(
                'http://www.holidaycheck.com/participate.php'=>'k provideshotel reviews, travel pictuHolidayChecres and tips by travellers, as well as recommendations. Check out the authentic holiday photos and videos to get an impression. Let your voice be heard by other members of the myHolidayCheck community! Submit hotels reviews, pictures and upload travel videos.',
                'http://www.tripadvisor.co.uk/'=>"You'll find real hotel reviews you can trust at TripAdvisor so make sure you read these reviews and choose the perfect hotel for your next stay. Millions of travellers like you have shared their honest reviews of hotels, B&Bs, inns, and more. Add your own travel reviews and help travellers around thoye world plan and have a great trip.",
                'http://www.zoover.co.uk/'=>"At Zoover you can find holiday reviews by travellers for travellers. At Zoover, travellers have reviewed hotels, apartments,campsites, holiday parks, cruises, holiday homes and more. What about the best  campsites for children, the best hotels for a city trip or hotels that are good value for money? You can find all the reviews at Zoover when searching for accommodations or destinations.",
                "http://www.holidays-uncovered.co.uk/"=>"Over 100,000 reviewed holidays written by real holiday makers like you on the most popular holiday destinations around the world. We offer you the real truth about the hotel you are planning to spend your holiday at and protect you from making the wrong choice. To make sure you can fully enjoy your trip.",
                'http://forum.holidaywatchdog.com/'=>"Looking for ideas about your next holiday? Holiday Watchdog travellers have a few favourite spots around the world. Read thousands of reviews on top hotels and holidays. Holiday Watchdog offers you Hotel and Holiday Reviews, Vacation Reviews, Independent Travel Review and Travel Advice. Find the perfect holiday you are searching for.",
                'http://www.globalhotelreview.com/'=>"Are you tired of Ad Advisor? Then look no more, enjoy an ad free travel review experience the way the internet once was.  What drove us was a real passion for travel, thus we decided to re-engineer our site to be ad free platform providing exactly what users came to look for : genuine travel reviews, delivered by an impartial platform. Make your choice now!",
                'http://www.triptake.com/'=>"If you decided to set off travelling, then make a good hotel reservation in the luxury hotel to have quality time during your holidays. If you wish to have a good trip, then it is better for you to plan the holiday in advance, reading the travel hotel reviews of the people who visited the hotel already and looking at the photos of hotel you like on our site. You have opportunity to compare hotel prices and choose the one good for you.",
                'http://www.hotels.com/'=>"We have over 2.5 million customer reviews for you to choose from. Our hotel reviews will help you find the best deal in the right location. Whether you are travelling last minute, as a family or need a hotel for business we have the right hotel deal for you. To ensure a great holiday experience for you!",
                'http://www.oyster.com/'=>"Our special investigators visit, photograph, review and rate each hotel. We uncover the truth, before it's \"uh-oh\" time. We know more about the hotels we cover than anyone else. How? Because we've been there. No second-hand knowledge used here. Our hotel investigators visit every hotel and take hundreds of accurate photos, so you know exactly what you're booking yourself into.",
                'http://www.raveable.com/'=>"Want to make sure you’re booking a room at a reputable hotel? Our system analyzes millions of traveler reviews to give you the inside scoop on which hotels are keeping customers satisfied and which are leaving their guests grumbling after check-out. Don’t want your dream vacation to turn into a bed bug infestation? We can help with that. Raveable actively monitors the web and customer comments to let you know which hotels have had reports of bed bug sightings within the past year. Make sure you book the best hotel for you.",
            ),
            'br'=>array(
                'http://www.holidaycheck.com/participate.php'=>'k provideshotel reviews, travel pictuHolidayChecres and tips by travellers, as well as recommendations. Check out the authentic holiday photos and videos to get an impression. Let your voice be heard by other members of the myHolidayCheck community! Submit hotels reviews, pictures and upload travel videos.',
                'http://www.tripadvisor.co.uk/'=>"You'll find real hotel reviews you can trust at TripAdvisor so make sure you read these reviews and choose the perfect hotel for your next stay. Millions of travellers like you have shared their honest reviews of hotels, B&Bs, inns, and more. Add your own travel reviews and help travellers around thoye world plan and have a great trip.",
                'http://www.zoover.co.uk/'=>"At Zoover you can find holiday reviews by travellers for travellers. At Zoover, travellers have reviewed hotels, apartments,campsites, holiday parks, cruises, holiday homes and more. What about the best  campsites for children, the best hotels for a city trip or hotels that are good value for money? You can find all the reviews at Zoover when searching for accommodations or destinations.",
                "http://www.holidays-uncovered.co.uk/"=>"Over 100,000 reviewed holidays written by real holiday makers like you on the most popular holiday destinations around the world. We offer you the real truth about the hotel you are planning to spend your holiday at and protect you from making the wrong choice. To make sure you can fully enjoy your trip.",
                'http://forum.holidaywatchdog.com/'=>"Looking for ideas about your next holiday? Holiday Watchdog travellers have a few favourite spots around the world. Read thousands of reviews on top hotels and holidays. Holiday Watchdog offers you Hotel and Holiday Reviews, Vacation Reviews, Independent Travel Review and Travel Advice. Find the perfect holiday you are searching for.",
                'http://www.globalhotelreview.com/'=>"Are you tired of Ad Advisor? Then look no more, enjoy an ad free travel review experience the way the internet once was.  What drove us was a real passion for travel, thus we decided to re-engineer our site to be ad free platform providing exactly what users came to look for : genuine travel reviews, delivered by an impartial platform. Make your choice now!",
                'http://www.triptake.com/'=>"If you decided to set off travelling, then make a good hotel reservation in the luxury hotel to have quality time during your holidays. If you wish to have a good trip, then it is better for you to plan the holiday in advance, reading the travel hotel reviews of the people who visited the hotel already and looking at the photos of hotel you like on our site. You have opportunity to compare hotel prices and choose the one good for you.",
                'http://www.hotels.com/'=>"We have over 2.5 million customer reviews for you to choose from. Our hotel reviews will help you find the best deal in the right location. Whether you are travelling last minute, as a family or need a hotel for business we have the right hotel deal for you. To ensure a great holiday experience for you!",
                'http://www.oyster.com/'=>"Our special investigators visit, photograph, review and rate each hotel. We uncover the truth, before it's \"uh-oh\" time. We know more about the hotels we cover than anyone else. How? Because we've been there. No second-hand knowledge used here. Our hotel investigators visit every hotel and take hundreds of accurate photos, so you know exactly what you're booking yourself into.",
                'http://www.raveable.com/'=>"Want to make sure you’re booking a room at a reputable hotel? Our system analyzes millions of traveler reviews to give you the inside scoop on which hotels are keeping customers satisfied and which are leaving their guests grumbling after check-out. Don’t want your dream vacation to turn into a bed bug infestation? We can help with that. Raveable actively monitors the web and customer comments to let you know which hotels have had reports of bed bug sightings within the past year. Make sure you book the best hotel for you.",
            ),
            'sa'=>array(
                'http://www.holidaycheck.com/participate.php'=>'k provideshotel reviews, travel pictuHolidayChecres and tips by travellers, as well as recommendations. Check out the authentic holiday photos and videos to get an impression. Let your voice be heard by other members of the myHolidayCheck community! Submit hotels reviews, pictures and upload travel videos.',
                'http://www.tripadvisor.co.uk/'=>"You'll find real hotel reviews you can trust at TripAdvisor so make sure you read these reviews and choose the perfect hotel for your next stay. Millions of travellers like you have shared their honest reviews of hotels, B&Bs, inns, and more. Add your own travel reviews and help travellers around thoye world plan and have a great trip.",
                'http://www.zoover.co.uk/'=>"At Zoover you can find holiday reviews by travellers for travellers. At Zoover, travellers have reviewed hotels, apartments,campsites, holiday parks, cruises, holiday homes and more. What about the best  campsites for children, the best hotels for a city trip or hotels that are good value for money? You can find all the reviews at Zoover when searching for accommodations or destinations.",
                "http://www.holidays-uncovered.co.uk/"=>"Over 100,000 reviewed holidays written by real holiday makers like you on the most popular holiday destinations around the world. We offer you the real truth about the hotel you are planning to spend your holiday at and protect you from making the wrong choice. To make sure you can fully enjoy your trip.",
                'http://forum.holidaywatchdog.com/'=>"Looking for ideas about your next holiday? Holiday Watchdog travellers have a few favourite spots around the world. Read thousands of reviews on top hotels and holidays. Holiday Watchdog offers you Hotel and Holiday Reviews, Vacation Reviews, Independent Travel Review and Travel Advice. Find the perfect holiday you are searching for.",
                'http://www.globalhotelreview.com/'=>"Are you tired of Ad Advisor? Then look no more, enjoy an ad free travel review experience the way the internet once was.  What drove us was a real passion for travel, thus we decided to re-engineer our site to be ad free platform providing exactly what users came to look for : genuine travel reviews, delivered by an impartial platform. Make your choice now!",
                'http://www.triptake.com/'=>"If you decided to set off travelling, then make a good hotel reservation in the luxury hotel to have quality time during your holidays. If you wish to have a good trip, then it is better for you to plan the holiday in advance, reading the travel hotel reviews of the people who visited the hotel already and looking at the photos of hotel you like on our site. You have opportunity to compare hotel prices and choose the one good for you.",
                'http://www.hotels.com/'=>"We have over 2.5 million customer reviews for you to choose from. Our hotel reviews will help you find the best deal in the right location. Whether you are travelling last minute, as a family or need a hotel for business we have the right hotel deal for you. To ensure a great holiday experience for you!",
                'http://www.oyster.com/'=>"Our special investigators visit, photograph, review and rate each hotel. We uncover the truth, before it's \"uh-oh\" time. We know more about the hotels we cover than anyone else. How? Because we've been there. No second-hand knowledge used here. Our hotel investigators visit every hotel and take hundreds of accurate photos, so you know exactly what you're booking yourself into.",
                'http://www.raveable.com/'=>"Want to make sure you’re booking a room at a reputable hotel? Our system analyzes millions of traveler reviews to give you the inside scoop on which hotels are keeping customers satisfied and which are leaving their guests grumbling after check-out. Don’t want your dream vacation to turn into a bed bug infestation? We can help with that. Raveable actively monitors the web and customer comments to let you know which hotels have had reports of bed bug sightings within the past year. Make sure you book the best hotel for you.",
            ),
        );
        
        return $aLinks[$country];
    }
}