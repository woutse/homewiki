<?php

$useragent = $_SERVER['HTTP_USER_AGENT'];

$mobile = false;
if (preg_match(
    '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',
    $useragent
  ) || preg_match(
    '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
    substr($useragent, 0, 4)
  )) {
    $mobile = true;
}


function table($arr)
{
    echo '<table>';
    foreach ($arr as $k => $v) {
        echo '<tr><td>' . $k . '</td><td>' . $v . '</td></tr>';
    }
    echo '</table>';
}

?>
<html>
<head>
    <title>HomeWiki</title>
    <?php if($mobile) : ?>
        <link rel="stylesheet" type="text/css" href="css/wikimobile.css?c=t2e4ee5e3"/>
    <?php else : ?>
        <link rel="stylesheet" type="text/css" href="css/desktop.css"/>
    <?php endif; ?>
    <script type="text/javascript" src="jquery.js"></script>
    <script>
        jQuery('document').ready(function () {
            jQuery(".infoblock.index a").click(function () {
                let theid = jQuery(this).data('togo');
                document.getElementById(theid).scrollIntoView();
            });

            jQuery('.toTop').click(function () {
                document.getElementById('theTop').scrollIntoView();
            });

        });
    </script>
</head>
<body>

<div class="infoblock index" id="theTop">
    <h2>INDEX</h2><br>
    <a data-togo="verzekeringen">Verzekeringen/Pensioen</a>
    <a data-togo="gaselektra">Gas/Elektra/Water</a>
    <a data-togo="cvketel">CV Installatie</a>
    <a data-togo="tijdinstellen">Tijd Instellen</a>
    <a data-togo="vloerverwarming">Vloerverwarming</a>
    <a data-togo="zonnepanelen">Zonnepanelen</a>
    <a data-togo="eten">Wat eten we vandaag?</a>
    <a data-togo="internetkpn">Internet KPN</a>
    <a data-togo="volvoex30">Volvo EX30</a>
    <a data-togo="meterkast">Meterkast</a>
    <a data-togo="laadpaal">Laadpaal</a>
    <a data-togo="quooker">Quooker</a>
    <a data-togo="huis">Huis info</a>
    <a data-togo="hypotheek">hypotheek</a>
    <a data-togo="stromer">Stromer</a>
    <a data-togo="leo">Leo</a>
</div>

<div class="stromer" id="leo"><span class="toTop">index</span><h2>stromer</h2>
    <br>

    Gekocht bij Qicq, rond maart 2022<br><br>
    Prijs: 6270,80 <a target="_blank" href="files/stomerfactuur.pdf">factuur</a><br><br>
    Accu: 814 kw<br><br>
    <br>
    Gevallen in juli/aug 2023, schade zelf betaald<br>
    <br>
    elk jaar onderhoud gepleegd.<br>
    <br>



</div>
<div class="infoblock" id="leo"><span class="toTop">index</span><h2>Leo</h2>
    Leonie Peeman 29 maart 1978
    Geboren te Middelharnis
    Donor+donor Hersenbank

    <b>Alle documenten en wachtwoorden zijn te vinden in Keeper.</b>
    <h4>Uitvaartverzekering</h4>
    Uitvaartverzekering Dela Polisnummer: 1674016
    · MijnDela: inloggen via Keeper.

    Mijn Uitvaartwensen: staan mijn wensen. Zou ik eerst volledig lezen voordat je gaat bellen. Dela kun je namelijk bellen bij overlijden. Dan regelen zij sowieso eerste zaken.
    Na begrafenis kan Dela ook nog helpen bij praktische zaken.

    · Wendy Tuns bellen, zij kan sowieso spreken en weet misschien een vlotte begrafenisondernemer. Anders komt Dela waarschijnlijk met iets sufs.
    · Rabobank: Dé bewuste kaartjes, staan in map in kast in hal boven. Kopie in Keeper

    Cash voor Chouffe en bitterballen.

    <h4>Pensioen</h4>
    Pensioenfonds Zorg en Welzijn. Klantnummer: 780329448
    Inloggen met Digi D
    Wouter Jonker is hier geregistreerd als mijn partner.
    Bij overlijden ontvangt Wouter vanaf mijn overlijden partnerpensioen.

    <h4>Beleggingsplan</h4>
    · Avero Achmea beleggingsplan polisnummer: 61091015
    Betaal ik geen premie meer voor, staat nog wel geld op.
    Begunstigde: Wouter Jonker=erfgenaam door testament
    · Bitvavo, bitcoins!!

    <h4>Rabobank</h4>
    Betaalrekening, spaarrekening en creditcard
    Verzekeringen:
    Interpolis Verzekering: (onderdeel Rabobank) polisnummer: 00303318832
    · rechtsbijstand
    · reisverzekering
    · inboedel
    · aansprakelijkheidsverzekering
    · fietsverzekering

    <b>Ander Zorg</b>, ziektekostenverzekering polisnummer: 5595370335

    <h4>Mobiel</h4>
    KPN 06-19008587
    Pincode zie Keeper

    <h4>Mail</h4>
    Hotmail: leonie-27@hotmail.com
    Gmail: peemanl67@gmail.com (foto’s! Agenda) zelfde wachtwoord als hotmail.
    Zie ook Keeper

    <h4>Testament</h4>
    Erfgenaam Wouter Jonker
    Bij gelijktijdig overlijden zijn erfgenamen:
    Voor Wouters kant: Erfgenamen familie Jonker (ouders)
    Voor Leonies kant: Annemieke, Lisa, Stephan

    <h4>Stopzetten</h4>
    · Easypark
    · Quality Practice Tijdschrift
    · Nederlandse Vereniging van Mondhygiënisten
    · Oost West Wonen (voor honderd jaar woonpunten, overhevelen naar iemand anders?)
    · Postcodeloterij
    · Routiq fietsroutes
    · Spotify
    · VMBZ (vereniging mondzorg Bijzondere Zorg ofzo)
    · Yoga
    · Zwemmen
    · Outlook Hotmail account (jaarlijkse betaling voor pakket en Gigabytes)
    · Idem Google account
    · Boksen

</div>
<div class="infoblock" id="hypotheek"><span class="toTop">index</span><h2>hypotheek</h2>
<h3>Hypotheek info</h3><br>
Ik heb recht op hypotheekaftrek tot 2036, dan zit ik aan 30 jaar.

<l>Naam: </l> Rabo OpbouwHypotheek met plusvoorwaarden
<l>Hypotheeknummer: </l> 3420.942.230
<l>NHG:</l> Ja
<l>Looptijd</l> Onbepaald, maar zal op de max hypotheek-tijd, a 30 jaar, uitdraaien.
<l>Rente:</l> Vast 4,6% tot 1-11-2021, vanaf 2021 20 jaar vast met 1.9%
<l>Hypotheek bedrag:</l> 159.840
<l>Rabo OpbouwSpaarrekening:</l> 3289.712.095
<l>Online inzien</l> <a href="https://bankieren.rabobank.nl/wonen/hypotheken/login">Inloggen via iDIN</a><br><br>

    <l>Rabo rekening van lening <br>is waarschijnlijk: </l> 1073.48.969

<b>Per 01-11-2011</b>
<label>Rente bedrag p/m</label> 612.72
<label>Spaar inleg</label> EUR 159.76 p/m/ (vergoeding 4.6%)

<b>Per 01-11-2021</b>
<label>Rente:</label> Vast 1,9% tot 1-11-2041
<label>Spaar bedrag:</label> ca 277.87 p/m
<label>Rente bedrag p/m</label> ca 253,08     ((159840 /100 * 1.9) / 12 maanden ) <br/><br>

<b>Uitleg:</b>
Dit is dus feitelijk een aflossingsvrije hypotheek. Dit betekent echter niet dat je dit nooit moet aflossen, dat moet aan het einde van de looptijd.
Bij deze vorm sparen je 90.000, dit wordt afgelost rond 2036. Maar dan houd je dus, zoals het er nu voor staat, nog ca. 70.000 over.
Daarna betaal je dan nog ca 5 jaar 1.9% rente over 70.000 =  110 euro p/m rente, met daarbij geen hypotheek rente aftrek meer.
Na die 5 jaar, als de hypotheek is afgelopenb, moet je de 70.000 aflossen.

Zie prognose schema:
Je moet dit bedrag dus op 2041 (als je 60 bent) nog aflossen. Dus de opties zijn:
- a. Dit zo aanhouden, en aan het einde nog een nieuwe hypotheek of lening nemen om de 70.000 af te lossen.
- b. vanaf 2036 als de schuld nog 70.000, naast je 110 p/m gaan aflossen.
- c. Meer sparen dan de huidige inleg om zo tenminste beneden de 70.000 restschuld uit te komen. en dan na 30 jaar met een kleine restschuld over te houden. Hoe we dat aflossen zien we dan wel. Dat komt wel goed.

Mijn idee is nu om wel tot 2036 niet meer te sparen via rabo dan 90.000 om zo op die manier zo lang mogelijk van de hypotheek aftrek te profiteren.
Als ik bv eerder aan de 90.000 kom, en dit dan wordt afgelost, hoef if minder rente te betalen, en dus minder rente vergoeding vd belasting.

Mijn idee nu is om wel om onder de 70.000 uit te komen. Ik begrijp ook dat het belasting technisch ook niet altijd voordelig is om je hypotheek al volledig af te lossen.
Natuurlijk kan ik ook als een malle gaan aflossen, maar of dat het verstandigst is lastig te zeggen. Ik kan ook de hypotheek op deze manier uitsmeren, en genieten van je huidige geld.
vooralsnog wil ik komend rente voordeel overmaken naar een ing spaar, zodat ik dus in 2039 pas 90.000 aflos, want dan loopt mijn 30 jaar hypotheek rente afrek voordeel af.

Mogelijkheden:
    - extra sparen: resulteert in eerder 90.000 bereiken, waardoor je schuld lager wordt, minde profiteert van fiscaal voordeel. Daarom niet handig. Ook weinig rente bonus met 1.9%;
    - extra aflossen: kan, maar doet niet veel met je maandelijkse kosten, maar geld ben je dan wel kwijt.
    - (Dus)zelf extra sparen: geld opzij zetten, en dan aflossen wanneer je geen fiscaal voordeel meer hebt. daarna zijn rente kosten niet meer zoveel en is het restant bedrag niet al te hoog.


<b>Finally, het plan:</b>
Niet extra aflossen eenmalig, of per maand. Niet extra sparen via rabo. Maar via eigen potje.
Dan kan je altijd nog bij je geld. Daarna kun je het gespaarde bedrag gebruiken om de schuld deels af te lossen. Dit gelijk met de 90000.
Let op dat aflossen per keer max 20% is,
Het bedrag wat dan nog openstaat is ca. 43.000, dit moet dan in 6 jaar redelijk makkelijk af te lossen zijn. 43000 / 72 = 597 p/m


Prognose schema

    Jaar        Schuld              Gespaard      Rentebedrag   Sparen    Extra Sparen   Fiscaal Voordeel    Netto maandlasten
    2011        159.840              1.947        613           155              0             214           553,80
    2012        159.840              3.983        613           155              0             214           553,80
    2013        159.840              6.112        613           155              0             214           553,80
    2014        159.840              8.340        613           155              0             214           553,80
    2015        159.840             10.670        613           155              0             214           553,80
    2016        159.840             13.108        613           155              0             214           553,80
    2017        159.840             15.657        613           155              0             214           553,80
    2018        159.840             18.324        613           155              0             214           553,80
    2019        159.840             21.114        613           155              0             214           553,80
    2020        159.840             24.031        613           155              0             214           553,80
    2021        159.840             27.886        253           278              0              89           441,95
    2022        159.840             31.813        253           278              0              89           441,95
    2023        159.840             35.816        253           278              0              89           441,95
    2024        159.840             39.894        253           278              0              89           441,95
    2025        159.840             44.050        253           278          2,400              89           641,95
    2026        159.840             48.284        253           278          4,800              89           641,95
    2027        159.840             52.600        253           278          7,200              89           641,95
    2028        159.840             56.997        253           278          9,600              89           641,95
    2029        159.840             61.478        253           278         12,000              89           641,95
    2030        159.840             66.043        253           278         14,400              89           641,95
    2031        159.840             70.696        253           278         16,800              89           641,95
    2032        159.840             75.437        253           278         19,200              89           641,95
    2033        159.840             80.268        253           278         21,600              89           641,95
    2034        159.840             85.191        253           278         24,000              89           641,95
    2035        159.840             90.207        253           278         26,400              89           641,95
    2036         43.233                  0         68             0              0              24            44,45
    2037         43.233                  0         68             0              0              24            44,45
    2038         43.233                  0         68             0              0              24            44,45
    2039         43.233                  0         68             0              0              24            44,45
    2040         43.233                  0         68             0              0              24            44,45
    2041         43.233                  0         68             0              0              24            44,45
* Cols:  jaar, schuld, opgebouwd spaarbedrag, maandelijks spaar inleg, maandelijkse rente kosten, aftrek vergoeding, netto maandlasten

Vanaf  2036  heb je 30 hypotheek aftrek genoten

<a href="calc_hypotheek.php" target="_blank">Overzicht</a>

</div>

<div class="infoblock" id="huis"><span class="toTop">index</span><h2>Huis</h2>

    <l>Gebouwd</l>    mei-1910 oktober-1910
    <l>Bouwers</l>    M.Boeter en D. v.d. Waal 21 Juli 1910
    <l>In gebruikname sinds</l>    13-10-1910
    <l>Eerste eigenaar</l>    D. de Mooy
    <l>Tweede eigenaar</l>    Dhr. G.C. Buth.

    <h3>Verbouwing: 6 augustus 1964</h3>
    <i>Dakkapel</i>

    <h3>Verbouwing: 25 augustus 1970</h3>
    <i>Betreft het afbreken van een halfsteens aangebouwde keuken, het opnieuwe optrekken van genoemde aanbouw,
        doch althans met spouwmuren en bestemd als werkruimte.
        Een bestaand vertrek vergroten en als keuken inrichten, waarbij een kelder komt te vervallen.
        Tevens wordt het bestaande toilet gewijzigd, één en ander afgebeeld bijgaande tekening.</i>

    <h3>Nieuwe eigenaar</h3>
    Datum: 29 september 2011
    Naam: W.M. Jonker

    * In iedergeval tot 1964 heette de straat korteweegje, in de vergunningsaanvraag voor de keuken staat kortewegje genoemd. Dit is augustus 1970.


    Vergunning van 1910
    <a href="/files/kortewegje_scan-1.jpg" target="_blank"><img src="/files/kortewegje_scan-1.jpg" width="200"/></a><a  href="/files/kortewegje_scan-2.jpg" target="_blank"> <img  src="/files/kortewegje_scan-2.jpg" width="200"/></a>

    Bouwplan in 1910
    <a href="/files/kw19_grootplan.jpg" target="_blank"><img src="/files/kw19_grootplan.jpg" width="400"/></a>

    <a href="/files/kw19_plattegrond.jpg" target="_blank"><img src="/files/kw19_plattegrond.jpg" /></a>



    In 2011-09 is het huis gekocht.

    <h2>Documenten</h2>

    #TODO: vergunningen (pdfs/pngs) toeveogen

    - Vergunning verbouwing
    - Vergunning lichtkoepel
    - <a href="/files/TEK-01 B.jpg" target="_blank">Constructierapport aanbouw</a>
    - <a href="/files/tr.pdf" target="_blank">Constructietekening aanbouw</a>
    - verbouwings-tekeningen


    <h3>Verbouwings log</h3>
    2011/2012
    - tussenwand gemaakt in woonkamer om slaapkamer te creeeren
    - sloopwerkzaamheden
    2012-2013
    2013-2014
    2014-2015
    2015-2016
    2016-2017
    - oude houte woonklamer vloer verwijderd
    - juni schuimbeton gestort
    - vloerverwarming gelegd
    - deur gemaakt in steeg (van raam)
    - dubbelglas in woonkamer voorramen + rooster

    2017-2018
    - aanbouw fundering gemaakt
    - aanbouw beton gestort
    - extra leiding getrokken naar keuken voor kookplaat
    - nieuwe achterdeur in bijkeuken
    - muurweggebroken tussen bijkeuken en nieuwe aanbouw
    - waterput volgestoor met puin
    - stroom naar keuken geloegd
    - keuken afgwerkt
    - keuken gekocht en geinstalleerd.
    - plafond eetkamer gemaakt

    2018-2019
    - raamkozijn geplaatst
    - kunstof panelen geplaatst
    2019-
    - wc gemaakt

    - halletje/ingang
    - dakterras gemaakt
    - plafond woonkamer geschuurd en geverfd

    2020
    - voorraadkast getegeld en afgewerkt
    - bijkeuken afgemaakt: stuc / stroom/ getegeld / radiator + leidingen gevergd / lpafond gemaakt
    - woonkamer afgemaakt: tegelvloer gelegd, wandengeschilderd




</div>


<div class="infoblock" id="internetkpn"><span class="toTop">index</span><h2>internet KPN</h2>

    Wachtwoord voor de wifi extender op mijn kamer is: ABcd1234<br>
    Als daar geen internet op zit, probeer eerst het PAIR knopje op de hoofd extender in de meterkast
</div>
<div class="infoblock" id="eten"><span class="toTop">index</span><h2>Eten</h2>
    <h3>Wat zullen we nu weer eens eten?</h3>

    Spinazie met fruit
    Macaroni
    Spaghetti
    Zuurkool
    Turkse Dürüm
    Lasagne
    Wraps met kip
    Shoarma
    Stoommaaltijd
    Chili con corne
    Nasi
    Bami
    Pizza / patat / pannekoeken

    <input type="text" value="" placehorder="few"/>
</div>



<div class="infoblock" id="laadpaal"><span class="toTop">index</span><h2>Laadpaal</h2>

    Aangesloten: 29 Mei 2024
    Merk, type: Wallbox Pulsar Max 11kw 5 meter laadkabel
    Laadsnelheid: 7.4 kWh
    Gekocht bij: Slimmelaadpunt.nl
    Factuur: <a href="files/Factuur-2023218411.pdf">pdf</a>
    Handleiding: <a href="files/manual_laadpaal.pdf">pdf</a>

    ik heb de wallbox opnieuw ingesteld door:
    terug naar fabriekinstellingen in te stellen
    op de wallbox site, niet op de app, de lader verwijderd.
    toen op de app lader toevoegen gedaan - qr code gescand van een foto .
    de foto staat in je lib, zoek op qr of wallbox.
    dan via bluetooth verdergaan met installeren
    ik moest de huidige bluetooth entry verwijderen op mijn telefoon, vervolgens werd de wallbox gevonden en kon ik connectie maken.
    Daarna kan je de WIFI selecteren.
</div>

<div class="infoblock" id="tijdinstellen"><span class="toTop">index</span><h2>Tijd instellen</h2>

    <h3>Magnetron:</h3>
    Deur open
    Lang op knopje met driehoek links drukken tot tijd gaat knipperen.

    Met plus en min knopjes tijd inschakelen.
    Switchen tussen uur en minuten met de knop om 30 seconden te magnetronnen. (Vierkant op zijn zij. Streepje in het midden)
    Tijd ok? Dan ook op laatste knopje drukken.

    <h3>Oven:</h3>
    Dubbelklik op linkerafbeelding in scherm.
    Afbeelding met het vinkje.
    Nu krijg je een belletje. Doorklikken tot je een wijzerplaat ziet.
    Draaien met rechterknop tot je uur goed staat.
    Klik op vinkje.
    Dan minuten Draaien.
    Vinkje.
    Klaar
</div>

<div class="infoblock" id="verzekeringen"><span class="toTop">index</span><h2>Verzekeringen</h2>

    <h4>Inboedel: Alles in in</h4>
    Deze polis verzekert de volgende dingen:
    - inboedel
    - Aansprakelijkheids verzekering
    - Woonhuisverzekering
    - Rechtsbijstandverzekering

    Verzekeringnemer: Interpolis, tussenpersoon: Rabobank
    Polisnummer: 00137466931
    Kosten: nu 67,22 p/m (3-11-2025) (begon met 37,-)
    Gegevens in zien via https://www.interpolis.nl/mijn-interpolis, inloggen gaat via je bank/iDIN.

    <h4>Zorgverzekering</h4>
    https://www.zilverenkruis.nl, inloggen met DigiD

    <h4 style="margin-bottom: 0">Overlijdensrisicoverzekering 1 </h4>
    <l>Polisnummer</l> 60589479
    <l>Verzekeringnemer</l> Interpolis, tussenpersoon: Rabobank,
    <l>Kosten</l> 7,84 p/m  (nu in mei 2024 in 8,47)
    <l>Afgesloten</l> Bij afsluiten hypotheek in 2011
    <l>Extra</l> In een nieuw ingezonden <a href="/files/inboedel_verzekering/IMG_8095.JPG" target="_blank">brief</a> staat dat dit kan worden opgezegd. (maarja waarom zou ik)
    <l>Links</l> <a href="/files/Polisblad.pdf">polis (pdf)</a>  <A href="/files/interpolis.PNG">screenshot</A>

    <h4>Overlijdensrisicoverzekering oud (waarschijnlijk niet meer actief)</h4>
    Polisnummer: 60462145
    Verzekeringnemer: Interpolis, tussenpersoon: Rabobank,
    Kosten: 8,90 p/m
    Afgesloten: Bij afsluiten hypotheek in 2005? Uitzoeken! tm 2017 betaald

    <h4 style="margin-bottom: 1px">Overlijdensrisicoverzekering, Achmea, centraal beheer</h4>
    <l>Polisnummer</l> 61553409
    <l>Verzekeringnemer</l> Achmea, centraal beheer
    <l>Kosten</l> 12,54 p/m  (nu in mei 2024 in 8,47)
    <l>Afgesloten</l> Op eigen initiatief, op 27-05-2024
    <l>Loopt af</l> Op 01-12-2041
    <l>Uitkering</l> EUR 50.000 (vast bedrag)
    <l>Extra</l> Online account inloggen, gegevens in Keeper.
    <l>Links</l> <a href="/files/Productvoorwaarden.pdf">Productvoorwaarden</a> <A href="/files/achmea_brief.pdf">Achmea Brief.pdf</A> <A href="/files/achema_polis.pdf">Achema Polis.pdf</A>

    <h4>Uitvaarverzekering</h4>
    - had ik ooit - maar uit laten betalen : )

    <h4>Pensioen</h4>
    Nationale Nederlanden: t/m 2018 opgebouwd via werkgever TinTel.
    ASR: Vanaf 2018 t/m heden, via werkgever TinTel

    <u>Voor inzage kun je inloggen bij:</u>
    ASR met digiD
    Nationale Nederlanden met keepers account
    <a href="https://www.mijnpensioenoverzicht.nl">https://www.mijnpensioenoverzicht.nl</a> voor het totaaloverzicht, inloggen via DigiD.
</div>

<div class="infoblock" id="gaselektra"><span class="toTop">index</span><h2>Gas & elektra</h2>
    Huidige stroomprijs: € 0,34 per kWh (september 2023)
    Huidige gasprijs: 1,28 per m3 (september 2023)

    Nieuw jaar contract afgesloten per 30 september 2023.
    elktro: = <B>0,36864 per kWh</B>
    gas <b> 1,48867</b>

    * In augustus dit nog even lezen :https://gathering.tweakers.net/forum/list_messages/2235240
    * is het verstandig om lang vast te zetten ivm salderen en "voorkomen dat je de komende jaren een hoge teruglever 'boete' mag aftikken"

    1,37 gas m3
    0,39 kWh stroom

    <b>2025</b>
    Contract voor 3 jaar:
    • Eneco HollandseWind & Zon 3 jaar 04-01-2025 05-01-2028
    • Eneco Gas 3 jaar 04-01-2025 05-01-2028

    kwh: 0,26661
    gasm3: 1,38356

    <table>
        <thead>
        <tr>
            <th>Jaar</th>
            <th>Stroom kWh</th>
            <th>Gas m3</th>
        </tr>
        </thead>
        <tbody>

        <tr><td>2026</td><td>5006</td><td>1755</td></tr>
        <tr><td>2025</td><td>4363</td><td>1211</td></tr>
        <tr><td>2024</td><td>3561*</td><td>1647</td></tr>
        <tr><td>2023</td><td>2692</td><td>1377</td></tr>
        <tr>
            <td>2022</td>
            <td>3119</td>
            <td>1467</td>
        </tr>
        <tr>
            <td>2021</td>
            <td>3571</td>
            <td>1802</td>
        </tr>
        <tr>
            <td>2020</td>
            <td>4000</td>
            <td>1520</td>
        </tr>
        <tr>
            <td>2019</td>
            <td>3064</td>
            <td>1717</td>
        </tr>
        <tr>
            <td>2018</td>
            <td>2577</td>
            <td>1955</td>
        </tr>
        <tr>
            <td>2017</td>
            <td>2277</td>
            <td>2075</td>
        </tr>
        <tr>
            <td>2016</td>
            <td>2205</td>
            <td>1625</td>
        </tr>
        <tr>
            <td>2015</td>
            <td>2739</td>
            <td>1118</td>
        </tr>
        <tr>
            <td>2014</td>
            <td>3157</td>
            <td>791</td>
        </tr>

        </tbody>
    </table>
    * Dit jaar 2085 kwh van zon, maar ook per juli laden auto

Meterstanden per maand 2025
    <table border="0">
        <thead>
        <tr>
            <th>Maand</th>
            <th>Stroom kWh</th>
            <th width="100">+</th>
            <th>Gas m3</th>
            <th>+</th>
        </tr>
        </thead>
        <tbody>
<!--        <tr><td>januari</td><td>39045</td><td></td><td>..</td></tr>-->
<!--        <tr><td>01-01-25</td><td>38357</td><td></td><td>49456</td></tr>-->
<!--        <tr><td>28-02-25</td><td>39831</td><td></td><td>50125</td></tr>-->
<!--        <tr><td>08-03-25</td><td>39843</td><td></td><td></td></tr>-->
<!--        <tr><td>18-03-25</td><td>39995</td><<td></td><td></td>/tr>-->
<!--        <tr><td>31-03-25</td><td>40193</td><td></td><td></td></tr>-->
<!--        <tr><td>04-04-25</td><td>40226</td><td></td><td>50317</td></tr>-->
<!--        <tr><td>02-05-25</td><td>40441</td><td></td><td>50413</td></tr>-->
<!--        <tr><td>21-05-25</td><td>40566</td><td></td><td></td></tr>-->
<!--        <tr><td>01-06-25</td><td>40668</td><td></td><td>50486</td></tr>-->
<!--        <tr><td>03-07-25</td><td>40835</td><td></td><td>50518</td></tr>-->
<!--        <tr><td>04-08-25</td><td>41131</td><td></td><td>50539</td></tr>-->
<!--        <tr><td>01-09-25</td><td>41279</td><td></td><td>?</td></tr>-->
<!--        <tr><td>01-10-25</td><td>41411</td><td></td><td>50617</td></tr>-->
<!--        <tr><td>01-11-25</td><td>42105</td><td><s/td><td>50760</td></tr>-->
<!--        <tr><td>15-11-25</td><td>42405</td><td>+300</td><td>-</td></tr>-->
<!--        <tr><td>01-12-25</td><td>42755</td><td>+350</td><td>50957</td><td>+197</td></tr>-->
<!--        <tr><td>01-01-26</td><td>43363</td><td>+608</td><td>51211</td><td>+254</td></tr>-->

<tr><td>01-01-25</td><td>38357</td><td></td><td>49456</td><td></td></tr>
<tr><td>01-02-25</td><td>39131*</td><td>+774*</td><td>49807</td><td>+351</td></tr>
<!--<tr><td>28-02-25</td><td>39831</td><td>+700</td><td>50125</td><td>+669</td></tr>-->
<tr><td>01-03-25</td><td>39831</td><td>+700</td><td>50125</td><td>+318</td></tr>

<!--<tr><td>08-03-25</td><td>39843</td><td>+12</td><td></td><td></td></tr>-->
<!--<tr><td>18-03-25</td><td>39995</td><td>+152</td><td></td><td></td></tr>-->
<!--<tr><td>31-03-25</td><td>40193</td><td>+198</td><td></td><td></td></tr>-->

<!--<tr><td>01-04-25</td><td>40226</td><td>+395</td><td>50317</td><td>+192</td></tr>-->

<tr><td>01-04-25</td><td>40191</td><td>+360</td><td>50300</td><td>+175</td></tr>

<tr><td>01-05-25</td><td>40441</td><td>+250</td><td>50413</td><td>+113</td></tr>

<!--<tr><td>21-05-25</td><td>40566</td><td>+125</td><td></td><td></td></tr>-->

<tr><td>01-06-25</td><td>40668</td><td>+227</td><td>50486</td><td>+73</td></tr>

<tr><td>01-07-25</td><td>40835</td><td>+167</td><td>50518</td><td>+32</td></tr>

<tr><td>01-08-25</td><td>41131</td><td>+296</td><td>50539</td><td>+21</td></tr>

<tr><td>01-09-25</td><td>41279</td><td>+148</td><td>50578</td><td>+39</td></tr>

<tr><td>01-10-25</td><td>41411</td><td>+132</td><td>50617</td><td>+39</td></tr>

<tr><td>01-11-25</td><td>42105</td><td>+694</td><td>50760</td><td>+143</td></tr>

<!--<tr><td>15-11-25</td><td>42405</td><td>+300</td><td></td><td></td></tr>-->

<tr><td>01-12-25</td><td>42755</td><td>+650</td><td>50957</td><td>+197</td></tr>

<tr><td>01-01-26</td><td>43363</td><td>+608</td><td>51211</td><td>+254</td></tr>

        <tr><td colspan="5"><hr></td></tr>
        <tr><td>total</td><td>5.006</td><td></td><Td>1.755</Td><td>+123  <a href="files/scans/eneco_totalen-2526.png">eneco komt op iets minder</a> </td></tr>
        <tr><td colspan="5"><hr></td></tr>

        <tr><td>01-02-26</td><td>44080</td><td>+717</td><td>51523</td><td>+321</td></tr>


        <tr><td>01-03-26</td><td>44766</td><td>+686</td><td title="geschat">51803*</td><td>280*</td></tr>
        <tr style="opacity: 0.6"><td>17-03-26</td><td></td><td></td><td>51873</td><td>+350</td></tr>

        <tr><td>01-04-26</td><td>45211</td><td>+445</td><td>51971</td><td>+168</td></tr>

        <tr><td>01-05-26</td><td>45460</td><td>+249</td><td>52107</td><td>+136</td></tr>
        <tr><td>01-06-26</td><td>45608</td><td>+148</td><td>52188</td><td>+81</td></tr>

        <tr><td>01-07-26</td><td>45804</td><td>+196</td><td>52222</td><td>+34</td></tr>
        <tr><td>01-08-26</td><td>45890</td><td>+86</td><td>52238</td><td>+16</td></tr>


<tr><td>01-09-26</td><td>46202</td><td>+312</td><td>52251</td><td>+13</td></tr>



        <tr><td>01-10-26</td><td>46432</td><td>+230</td><td>52275</td><td>+24</td></tr>

        <tr><td>01-11-26</td><td>47038</td><td>+606</td><td>52419</td><td>+144</td></tr>


<tr><td colspan="5"><hr></td></tr>
<tr><td>(tussen)total</td><td>-3.675</td><td></td><Td>1.208</Td><td> </td></tr>
<tr><td colspan="5"><hr></td></tr>


    </table>


    Water:
    Op 21-01-2025 watermeter verwisseld, nieuwe stand: 0.

    stand 20-05-2026: 185 (verbruik dus 138)
    stand 22-05-2025: 47
s
    Verbruik:

    2023: 147 m3
    2022: 110 m3
    2021: 143 m3
    2020: 144 m3
    2019: 137 m3
    2018: 113 m3
    2017: 119 m3

</div>

<div class="infoblock" id="cvketel"><span class="toTop">index</span><h2>cvketel</h2>

    Hier alles over de cvketel
    <table>
        <thead>
        <th></th>
        <th></th>

        </thead>
        <tbody>
        <tr>
            <td>Merk</td>
            <td>Intergas Combiketel HRE 28/24 CW4 24KW</td>
        </tr>
        <tr>
            <td>Geinstalleerd door</td>
            <td>De Eilanden Installatie Techniek</td>
        </tr>
        <tr>
            <td>Datum</td>
            <td>07-11-2023</td>
        </tr>
        <tr>
            <td>Factuur</td>
            <td><a target="_blank" href="files/BalieirectfactuurV20233805.pdf">factuur</a></td>
        </tr>
        <tr>
            <td>Kraan icoontje</td>
            <td>Kun je op toggelen. Bovenste lampje = eco, 2e betekend: AAN. Alles uit is: functie uitgeschakeld. Wat doet het: zorgt voor dat je sneller warm waterkrijgt bij tappen. Hoeft niet, dus uit.  </td>
        </tr>
        <tr>
            <td>handleiding</td>
            <td><a href="/files/handleidingcv.pdf">handleiding</a></td>
        </tr>
        </tr>
        <tr>
            <td>Abonnementsnummer</td>
            <td>OC241611</td>
        </tr>
        </tr>
        <tr>
            <td>email</td>
            <td>onderhoud@de-eilanden.nl</td>
        </tr>

        </tbody>
    </table>
    Met     Intergas Comfort Touch kamerthermostaat + gateway (voorkeur wit).
    All-in Service garantie aanbieding.


</div>

<div class="infoblock" id="vloerverwarming"><span class="toTop">index</span><h2>vloerverwarming</h2>

    Hier alles over vloerverwarming
</div>


<div class="infoblock" id="zonnepanelen"><span class="toTop">index</span><h2>Zonnepanelen</h2>
    <i style="color:orange">
        Vanaf 2025 gaat mogelijk een nieuw wetsvoorstel in.
        Daarbij wordt de huidige salderingsregeling stap voor stap afgebouwd (Milieu Centraal).
        Daarom hebt u straks een energiemeter nodig die apart meet hoeveel stroom u afneemt en teruglevert aan het net.

        Wel geschikt voor de nieuwe regeling zijn uiteraard de slimme meter en digitale meters met teruglever-registratie.
        Wilt u geen slimme meter? U kunt ook kiezen voor een digitale meter die niet op afstand uitleesbaar is.
    </i>

    <table>
        <tbody>
        <tr>
            <td>Aantal panelen</td>
            <td>8</td>
        </tr>
        <tr>
            <td>Paneel kwh</td>
            <td>415 Wattpiek</td>
        </tr>
        <tr>
            <td>Garantie</td>
            <td>25 jaar piek</td>
        </tr>
        <tr>
            <td>Totaal vermogen</td>
            <td>8 * 415 = 3320 </td>
        </tr>
        <tr>
            <td>Gewicht</td>
            <td> 22 kg</td>
        </tr>
        <tr>
            <td>Link</td>
            <td><a href="https://www.stralendgroen.nl/product/hyundai-vg-415wp">hyundai-vg-415wp</a></td>
        </tr>

        <!--        Input: 4200 Wp | Output vermogen: 3000 Watt-->
        <tr><td><br><b>Omvormer</b></td></tr>
        <tr><td>Merk</td><td>Growatt</td></tr>
        <tr><td>Type</td><td>MIN 3000TL-XE</td></tr>
        <tr><td>Max output</td><td>3000 Watt</td></tr>
        <tr><td>Max input</td><td>4200 Watt</td></tr>
        </tbody>
    </table>

    <b>Opbrengsten</b>
    <table ><thead><th>Jaar</th><th>kWh</th></thead><tbody><tr><td>2024</td><td>628 tot nu toe(14 mei)</td></tr><tr><td>2023</td><td>383</td></tr></tbody></table>

    Totaal paneelvermogen, 3320, is dus meer dan de max output van de omvormer, 3000.
    Niet erg, want 3320 zal in de praktijk weinig/niet gehaald worden.

    Er zijn 8 panelen, verdeeld over twee strings (groepen): de linker vier en de rechter vier, zodat ze beter kunnen renderen als er schaduw valt op een paneel.

    De omvormer is aangesloten op een pv-verdeler. De opbrengst van de zonnepanelen-installatie mag bij een PV-verdeler maximaal 3680 Watt bedragen.

    PV-verdeler wordt gebruikt om een bestaande groep, waarop 1 apparaat is aangesloten, te splitten zodat hier ook zonnepanelen op aangesloten kunnen worden.

    De omvormer is geschikt voor een 1-fase aanlsuiten, maar functioneert zowel op een 1- als 3-fase aansluiting.

    * Een 1-fase omvormer kan zonder problemen op een 3-fase aansluiting worden aangesloten. De netbeheerder adviseert daarin op welke fase uw zonnepanelen dan aangesloten dienen te worden.

    * Voor omvormer: een koele garage is de perfecte plek.

    * Gelijkstroom gaat van panelen naar omvormer, wisselstroom gaat van omvormer naar meterkast.

    <a href="files/zonpandata.jpeg">
    <img src="/files/zonpandata.jpeg" width="50%"/>
    </a>

</div>


<div class="infoblock" id="volvoex30">
    <span class="toTop">index</span>
    <h2>Volvo ex30</h2><br>

    <h3>EX30 Ultra, Twin Motor Performance, Elektrisch</h3>

    De handleiding: <a href="https://www.volvocars.com/nl/support/car/ex30">handleiding</a><br><br>
    <b>Software updates</b>: Zie <a href="https://www.volvocars.com/uk/support/car/ex30/software-release-notes">hier</a><br><br>
    <b>Pech?</b> Druk op het ballonnetjes knopje. Voorbeeld: accu leeg, pech, lekke band. Zie ook <a href="https://www.volvocars.com/nl/support/car/ex30/24w17/article/47d2c97fd33effd3c0a8cc3718c999b7-41f4767db6c52f9bc0a8b09752016248-8664b2fa77a7e089c0a8296870d1a409?search=pech&page=0">volvo assistance</a><br><br>

    <b>Ongeluk (een- of dubbelzijdig)</b> Schade? Formulier invullen, fotos maken. Kan niet verder rijden? Gebruik volvo assistance knopje. Check ook de <a target="_blank" href="https://www.volvocars.com/nl/care-by-volvo/veelgestelde-vragen">CbV FAQ</a>.
    <b>Ongeluk met letsel</b> bij noodgevallen SOS knop gebruiken, zij schakelen alarm diensten in.

    <b>Care By Volvo</b> <a href="https://www.volvocars.com/images/v/-/media/market-assets/netherlands/applications/dotcom/gob-cash/final_nl-subscription_tnc_dutch-2023-02-01.pdf">Voorwaarden</a>
    <b>Care By Volvo</b> <a target="_blank" href="https://www.volvocars.com/nl/care-by-volvo/veelgestelde-vragen">FAQ</a>

    Wasstraat: zet de wasmodi aan, en zet op N, on-hold-rem-functie uitzetten door OPD uit te zetten
    <?php
    echo table([
      'Gewicht' => '1850 Kg',
      'Capaciteit batterij' => '69 Kwh',
      'Range' => '476 km',
      'Verbruik ' => '17 kWh/100 km',
      'Acceleratie ' => '3.8s',
      'Max. gewicht trailer' => '1600kh',
      'Hoogte ' => '1 549 mm',
      'Lengte ' => '4 233 mm',
      'Gewicht ' => '1850 kg',
    ]);
    ?>
    <h4>Laden</h4><br>
    <l>Verwachtte laadtijd met 3,7 Kwh</l> 69 / 3,7  ongeveer 19 uur
   <l>Verwachtte laadtijd met 7,4 Kwh</l> 69 / 7,4  ongeveer 9,5 uur
    Auto heeft een Type 2 aansluiting en kan laden via 3 fase met 16 ampère.
    Hiervoor is een EV laadkabel Type 2, 3 fase, 16A geschikt.

    <h4>Leaseplan:</h4>
    * Looptijd 48 maanden
    * Abonnement via Care By Volvo, geen BKR
    * Maandelijkse kosten EUR 769,-
    * Kostenverdeling: Wouter: 60%, Leonie: 40%
    * Km's 20.000, extra km's 0.13 cent.

    <h4 style="margin-bottom: 0">Kosten-verdelings-onderbouwing</h4>
    <a href="http://192.168.2.200:9077/auto.php">auto.php</a>

    <i>
    In het geval van een maandrag 709, zeg maar het goedkoopste alternatief.
    Waren de kosten over 50% als volgt geweest: EUR 354.5 PP.
    Bij het uiteindelijke maandbedrag van 769, zou een 50% verdeling uitkomen op: EUR 384,50 PP.
    Omdat ik meer gebruik maak van de auto, en fan was van een duurder type, Is het eerlijk als Leonie daarom op zijn minst niet meer betaald dan 354,40. Dit is ook wat leonie aangaf als limiet(350).

    Daarom het volgende voorstel:
        Dit kost het wouter (60%) : <b>EUR 461.40</b> ( 22147.2)
        Dit kost het leonie (40%) : <b>EUR 307.60</b> ( 14764.8)

        Dit kost ons totaal: EUR 36.912,00

        ==> Voor Leonie betekend dit:

        Huidige vaste kosten (wegenbelasting en verzekering) is nu EUR 75,- p/m pp
        Dus kosten leo omhoog met: 307.6 - 75 = <b>EUR 232.60</b>

        ==> Voor Wouter betekend dit:

        Huidige vaste kosten omhoog met 461.4 - 75  = <b>EUR 386.4</b>

        Virtual Inlay: Wouter maakt maandelijks van auto-rek naar betaalrek over: EUR 146,-

        Dan is wouter zn koopkracht-verlies nog maar geslonken tot: <b>EUR 241</b>

        Optie: Huidig spaar bedrag van 500 verlagen naar 400 en voila, de gevoelsmatige verhoging is: 141
    </i>

    <b>In geval van ongemakken</b>
    - bij schade => ...
    - eerder opzeggen => ...

    <b>Verbruik & Kosten</b>
    Verwachte aantal kilometers: <h>18.000</h>
    Dit is in kWh: <h>3060kWh kWh</h>

    ==> De cijfers:

    <h4>Per jaar:</h4>
    Diesel/Elektriciteit voordeel: EUR 526.68 goedkoper uit
    Onderhoudskosten die wegvallen zijn: EUR 1000
    Extra opbrengsten 200 kwh a (0.18 cent) is: EUR 36
    Minus kosten voor extra km's a 13 cent: EUR 0

    <h4>Per maand leidt dat tot dit overzicht:</h4>

    Clio	EX30
    Wegenbelasting	100	0
    Onderhoudskosten	83	0
    Extra km kosten	0	0
    Verzekering	50	0
    Brandstof kosten	131	87
    Extra opbrengesten	0	-3
    subTotaal	364	84
    Leasekosten	0	769
    Totaal	364	853

    EX30 is per maand duurder: EUR 489

    Dus maandbedrag is bekend, wat we moeten betalen. Maar, hoeveel kost het nu uiteindelijk meer (geschat)...
    Alles meegerekend zijn dit bedragen die we uiteindelijk meer gaan betalen:
    Wouter meer tov clio: 293.4
    Minus virtual inlay: 147.4
    Minus 100 minder sparen : <b>47.4</b>

    EX 30 kost nu in totaal p/m: 497,0

    Leo meer tov clio: 195.6
    EX 30 kost nu in totaal p/m:  338,9

    <hr>

    <b>Kanttekeningen:</b>
    <ul>
        <li>Onderhoudskosten(clio) zullen dus wegvallen, die anno 2024 worden geschat op 1000 per jaar. Besparing van 41,66 pp p/m</li>
        <li>Extra kilometers: ik schat 3000 extra km's, dus 3000*0.13 = 390, /12 /2 = <B>16,25</B> pm pp bijbetalen.</li>
        <li>Brandstof kosten besparing van 834,72 euro (zie hierboven)</li>
        <li>wegvallende ondehoudskosten - extra km kosten  + brandstofvoordeel/2 =  <b>60,41 euro pp pm</b></li>
        <li>Wegenbelasting kan er in het verschiet bij komen</li>
        <li>Onbekend hoe lang de energiemeter nog terug loopt</li>
        <li>Een laadpaal kost misschien wel 1440 euro, die hebben we er dan na een jaar uit</li>
    </ul>

    <h4>Betaling en contract geschiedenis</h4>

    <table>
        <tr>
            <td width="100">05-07-2024</td>
            <td>Auto opgehaald bij dealer</td>
        </tr>
        <tr>
            <td>15-08-2024</td>
            <td>Cars and care fatuur a 145,20 - vogelpoep schuurpons affaire</td>
        </tr>
        <tr>
            <td>27-09-2024</td>
            <td>Factuur volvo a € 769,00  </td>
        </tr>
        <tr>
            <td>28-09-2024</td>
            <td>Care by volvo bevestigd verhoging km-rage: <br>
                U heeft aangegeven de kilometrage te willen wijzigen van 20.000 km naar 25.000 km op jaarbasis.
                Dit hebben wij voor u in onze systemen geregistreerd. De nieuwe kilometrage gaat in op 01 november 2024.
                Uw abonnementsbedrag wordt hierdoor aangepast van € 769,- naar € 799,- per maand.
                Hier na volgende factuur met correcties hiervan <a target="_blank" href="/files/volvo/fackmrage.pdf">factuur</a>
            </td>
        </tr>
        <tr>
            <td>18-11-2024</td>
            <td>De Nederlandse overheid is voornemens de kortingen op de motorrijtuigenbelasting voor volledig elektrische auto’s in de periode 2025-2030 (verder) af te bouwen. Voor uw volledig elektrische (BEV) Volvo geldt in 2024 een korting van 100%; in 2025 is de korting 75%.
                Voor 2025 betekent de aanpassing naar verwachting een verhoging van € 35,- per maand.
        </tr>
        <tr>
            <td>27-11-2024</td>
            <td>Factuur Volvo à € 799,00 naar aanleiding van verhoging kilometerstand naar 25.000 km</td>
        </tr>
        <tr>
            <td>27-12-2024</td>
            <td>Factuur volvo naar € 830,00 nav door 30 euro extra motorrijtuigbelasting, zoals genoemd 18-11-2024</td>
        </tr>
        <tr>
            <td>05-02-2025</td>
            <td>....Volvo besloten alle contracten en operationele activiteiten over te dragen aan Volvo Car
                Lease. Dit betekent voor u dat u vanaf maart 2025 een factuur ontvangt van Volvo Car Lease. Om dit
                mogelijk te maken, vragen wij u om opnieuw een SEPA-incassomachtiging te ondertekenen. Dit regelt u
                eenvoudig via onderstaande link.
            </td>
        </tr>
        <tr>
            <td>20-02-2025</td>
            <td>SEPA ondertekend voor Volco Car lease</td>
        </tr>
        <tr>
            <Td>24-04-2025</Td>
            <td>Beste heer Jonker,

                Welkom bij Volvo Car Lease! Uw abonnement is overgenomen door Volvo Car Lease. Goed om te weten is dat
                de voorwaarden van uw abonnement hetzelfde blijven. Ook de service die u gewend bent, blijft hetzelfde.
                Alleen de contactgegevens van onze klantenservice veranderen per 2 mei. Meer hierover leest u in deze
                e-mail.

                Welke contactgegevens wijzigen?
                Telefonisch bereikt u ons op werkdagen tussen 08:00 en 17:30 op 020 658 7322. Mailt u liever? Hieronder
                leest u welk e-mailadres u gebruikt voor verschillende situaties.

                1. Vragen over uw contract? : customercare@volvocarlease.nl.
            </td>
        </tr>
        <tr>
            <td>21-08-2025</td>
            <td>Verzoek gemailed om kilomterrage terug aan te passen naar 20.000 - later in oktober weer. </td>
        </tr>
        <tr>
            <td>17-10-25</td>
            <td>
                <B>Note: navraag gedaan om km-registratie terug te brengen - ik krijg een eindstand te zien die ik niet begrijp. Hieronder een paar verklaringen:</B>

                Het kilometrage van uw contract is met ingang van 01-11-2025 gewijzigd. Wij geven u graag een overzicht van wat dat concreet voor u betekent.

                Looptijd	Jaarkilometrage	Leasetarief
                Huidig contract	:	38 mnd	25.000 km	€ 830,00	exclusief brandstof
                Na aanpassing	:	38 mnd	20.000 km	€ 800,00	exclusief brandstof


                Daarnaast verandert voor u het volgende:
                De nieuwe contractuele einddatum is 30-06-2028.
                De nieuwe contractuele eindkilometerstand is 63.333 km.
                De nieuwe prijs voor meerkilometers wordt € 0,1300 per kilometer.
                De nieuwe vergoeding voor minderkilometers is € 0,0000 per kilometer.

                Naar aanleiding van uw verzoek ontvangt u hierbij een wijzigingsvoorstel ten behoeve van bovengenoemd contract.

                <hr>
                ik:

                echter, de voorgestelde eindkilometerstand lijkt niet te kloppen.
                Per 5 juli 2024 leasen wij de auto via Care by Volvo (later Volvo Car Lease), met een initiële kilometrage van 20.000 km per jaar, wat neerkomt op een beoogde eindstand van 80.000 km in juni 2028.
                Twee maanden later, in september 2024, is de kilometrage op ons verzoek verhoogd naar 25.000 km per jaar (zie factuur). Sindsdien betalen wij hiervoor €30 per maand extra.
                Per heden wil ik, zoals aangevraagd, de kilometrage weer terugzetten naar 20.000 km per jaar.
                Op basis hiervan verwacht ik een eindkilometerstand van 85.000 km.

                <hr>
                Wij geven u graag een overzicht van wat dat concreet voor u zal betekenen.
                Looptijd	Jaarkilometrage	Leasetarief
                Huidig contract	:	38 mnd	25.000 km	€ 830,00	exclusief brandstof
                Voorstel aanpassing	:	38 mnd	20.000 km	€ 800,00	exclusief brandstof


                Daarnaast verandert voor u het volgende:
                De nieuwe contractuele einddatum wordt 30-06-2028.
                De nieuwe contractuele eindkilometerstand wordt 63.333 km.
                De nieuwe prijs voor meerkilometers wordt € 0,1300 per kilometer.
                De nieuwe vergoeding voor minderkilometers wordt € 0,0000 per kilometer.

                De overige voorwaarden blijven hetzelfde. Alle genoemde bedragen zijn inclusief btw.
                Graag vernemen wij of u akkoord gaat met dit voorstel. Na uw akkoord zal uw contract per 01-11-2025 worden gewijzigd.
                <hr>
                Hartelijk dank voor uw bericht. Wellicht bent u al voorzien van een antwoord maar het lijkt mij netjes om alsnog een reactie op uw mail te sturen.

                Wij begrijpen dat de situatie verwarring kan veroorzaken en lichten dit graag toe. Voor de migratie is aan ons (Care by Volvo) een kilometerstand van 19.342 km doorgegeven per 1 mei 2025. Dit betekent dat uw nieuwe contract op basis van deze kilometerstand is gestart.

                Bij het bepalen van de totale gereden kilometers dient u de kilometerstand van het nieuwe contract op te tellen bij de eerder gereden kilometers. In uw geval:

                Start kilometerstand: 19.342 km
                Huidige kilometerstand: 63.333 km
                Totaal gereden kilometers: 82.675 km

                Wij hopen hiermee de situatie te hebben verduidelijkt.

                Met vriendelijke groet,
                Jermain Schenkers Finch
                <hr>

                Dank voor de mail.



                Wij hebben deze berekening gemaakt aan de hand van hoelang het contract nog bij ons loopt.

                Hierdoor calculeren wij over 38 maanden. Dat is wat u contractueel bij ons mag rijden.

                De kilometerstand per in gang contract 01-05-2025 is de start en wat daarvoor gereden is wordt in mindering gebracht bij inname.

                <Hr>

                Hartelijk dank voor uw bericht.

                Ik heb vernomen uit uw onderstaande bericht dat u graag uitleg had gewild.

                Wij begrijpen dat de situatie verwarring kan veroorzaken en lichten dit graag toe. Voor de migratie is aan ons (Care by Volvo) een kilometerstand van 19.342 km doorgegeven per 1 mei 2025. Dit betekent dat uw nieuwe contract op basis van deze kilometerstand is gestart.

                Bij het bepalen van de totale gereden kilometers dient u de kilometerstand van het nieuwe contract op te tellen bij de eerder gereden kilometers. In uw geval:

                Start kilometerstand: 19.342 km – 1 Mei
                Huidige kilometerstand: 63.333 km
                Totaal gereden kilometer’s : 82.675 km
                Einde contract : 146,008 km

                Wij hopen hiermee de situatie te hebben verduidelijkt.

                Met vriendelijke groet,
                van Spronsen

            </td>
        </tr>

        <tr>
            <td>25-10-2025</td>
            <td> factuur 799 door verlaging kmrage naar 20000</td>
        </tr>
        <tr>
            <td>19-12-2025</td>
            <td>De overheid heeft per 1 januari 2026 een verhoging van de motorrijtuigenbelasting (mrb) aangekondigd. Dit heeft invloed op uw leasetarief. Voor uw contract met nummer 1619500 wordt de leaseprijs per 05-01-2026 met € 60,80 verhoogd.

                Heeft u een elektrische of plug-in hybride auto?
                Voor volledig elektrische auto's wordt het tarief voor motorrijtuigenbelasting verhoogd. In 2026 betaalt u 70% van het normale tarief. Voor plug-in hybrides verdwijnt de belastingkorting: u betaalt dan het volledige tarief.

                Vragen?
                Het nieuwe leasetarief ziet u terug op de volgende factuur. Komt u er toch niet uit? Neem dan contact op met Volvo Car Lease via customercare@volvocarlease.nl. Vermeld hierbij uw kenteken of contractnummer.
            </td>

        </tr>
        <tr>
            <td>19-12-2025</td>
            <td>leaseprijs gaat dus naar 860</td>
        </tr>
        <tr>
            <td>29-12-2026</td>
            <td>onderhoudsbeurt bij vd wulp</td>
        </tr>
        <tr>
            <td>05-07-2026</td>
            <td>2 jaar de auto. km stand: 39.600 </td>
        </tr>
        <tr>
            <td>11-08-2026</td>
            <td>
                weer gemailed: reactie

                Geachte heer Jonker,

                Dank voor uw bericht. De contractuele eindstand is als volgt.
                Op 1 mei 2025 was uw kilometerstand 19.342 kilometer.
                Van 1 mei 2025 tot 1 november was uw jaarkilometrage 25.000 kilometer. Omgerekend naar 6 maanden is dat (25.000 / 12 * 6) = 12.500 kilometer.
                Vanaf 1 november 2025 tot het einde van het contract staat de jaarkilometrage op 20.000 kilometer. Dit betreft een periode van 32 maanden. In totaal betreft dit dus (20.000 / 12 * 32) = 53.333 kilometer.
                Aan het einde van de looptijd is het totaal dus (19.342 + 12.500 + 53.333) = 85.175 kilometer.

                Mocht u nog vragen hebben, neem dan gerust contact met ons op.

                <Hr> en ook:<Br>
                Beste heer Jonker,

                Dank voor uw bericht en excuses dat u nog geen reactie heeft ontvangen.
                Wij kunnen u geruststellen dat bij de eindafrekening van uw leasecontract rekening wordt gehouden met wijzigingen die gedurende de looptijd van het contract zijn doorgevoerd, waaronder aanpassingen van de overeengekomen jaarkilometrage. Dit betekent dat er niet uitsluitend wordt gekeken naar de oorspronkelijk afgesproken kilometerstand, maar ook naar de periode waarin een aangepast kilometrage van toepassing is geweest.
                Bij de contractbeëindiging wordt uw situatie daarom beoordeeld op basis van de daadwerkelijk contractueel vastgelegde kilometerafspraken gedurende de gehele looptijd van het contract. U hoeft zich hierover geen zorgen te maken; eerdere wijzigingen in uw kilometrage worden hierbij meegenomen zodat u niet voor onverwachte verrassingen komt te staan.
                Mocht u tegen het einde van het contract een specificatie of herberekening wensen, dan helpen wij u uiteraard graag verder.

                Met vriendelijke groet,

                Mevr van Spronsen

            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

</div>

<div class="infoblock" id="meterkast"><span class="toTop">index</span><h2>Meterkast</h2>

    De stroomaansluiting betreft een <b>1 fase, 35A</b>

    Hierbij wordt gezegd dat er maximaal 12 groepen mogen worden aangesloten

    Totale kracht: 230 * 35 = 8060 Watt, dus 8,1 kW

    Een groep is 16A,  en  16A * 230V = 3,7 Kw.

    <table>
        <tr>
            <td>Meternummer</td>
            <td>9506774</td>
        </tr>
        <tr><td>Ampere</td><td>35A</td></tr>
        <tr><td>EAN</td><td>871689290400300016</td></tr>
        <tr><td>Energieleverancier</td><td>Eneco Retail</td></tr>
        <tr>
            <td>Fases</td>
            <td>1</td>
        </tr>
    </table>

    Ik heb een Stedin account, de netbeheerder.

    <table>
        <thead>
        <tr>
            <th>Groep</th>
            <th>Apparaten</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Keuken S.C. + verlichting</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Koelkast, vaatwasser</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Magnetron, keuken s.c., schuur</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Afzuigkap, Quooker.</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Inducatie kookplaat</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Inducatie kookplaat.</td>
        </tr>
        <tr>
            <td>7</td>
            <td>PV-verdeler, wasmachine.</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Oven</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Bijkeuken, hal.</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Woonkamer, Eetkamer s.c.</td>
        </tr>
        <tr>
            <td>11</td>
            <td>Bad en wastafel-s.c.</td>
        </tr>
        <tr>
            <td>12</td>
            <td>Boven.</td>
        </tr>
        </tbody>
    </table>



</div>

<div class="infoblock" id="quooker">
    <span class="toTop">index</span>
    <h2>Quooker</h2><br>

    Reservoir vervangen op begin april 2024

</div>

</body>
</html>