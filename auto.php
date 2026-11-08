<?php

if (!empty($_REQUEST['gew'] ?? ''))
{

    $maandbedrag = $_REQUEST['amount'];
    $looptijd = $_REQUEST['looptijd'];
    $inleg = (int)$_REQUEST['inleg'] ?? 1;
    $onderhoud = round(($_REQUEST['onderhoud'] ?? 0) / 2, 2);
    $onderhoudJaar = $_REQUEST['onderhoud'] ?? 0;
    $onderhoud = round($onderhoud/12,2);
    $wp = (int)$_REQUEST['wp'] ?? 0;
    $wp = $wp /100;
    $lp = 1-$wp;

    $diesel_verbruik = $_REQUEST['diesel_verbruik'];
    $kms = $_REQUEST['kms'];
    $kwh_verbruik = $_REQUEST['kwh_verbruik'];
    $ext_auto = $_REQUEST['ext_auto'];
    $diesel = $_REQUEST['diesel'];
    $kwh_ext = $_REQUEST['kwh_ext'];
    $kwh = $_REQUEST['kwh'];
    $ladenthuis = $_REQUEST['ladenthuis'];
    $kwh_opbrengst = $_REQUEST['kwh_opbrengst'];
    $kmrage = $_REQUEST['kmrage'];


    if (empty($looptijd)) {
        exit('Vul looptijd in');
    }

    $inlaypm = $inleg / $looptijd;

    $pp1 = $maandbedrag * $wp;
    $pp2 = $maandbedrag * $lp;

    $pp = $maandbedrag / 2;


    echo '<pre style="white-space: break-spaces">';

    echo 'Wat vergelijken we? : De kosten per maand clio vs ex30'. PHP_EOL.PHP_EOL;

    echo 'Dit kost het wouter (' . ($wp * 100) . '%) : ' . $pp1 . ' ( ' . ($looptijd * $pp1) . ') ' . PHP_EOL;
    echo 'Dit kost het leonie (' . ($lp * 100) . '%) : ' . $pp2 . ' ( ' . ($looptijd * $pp2) . ') ' . PHP_EOL . PHP_EOL;
    echo 'Dit kost ons totaal: EUR ' .number_format( (($looptijd * $pp1 ) + ($looptijd * $pp2)),2,',','.')  . PHP_EOL.PHP_EOL;

    $costs_hard =  75;
    # $costs_pp = $onderhoud;

    $raise1 = ($pp1 - $costs_hard);
    $raise2 = ($pp2 - $costs_hard);

    # LEONIE
    echo '<hr>';
    echo '<b>==> Leonie:</b </br></br></br>';

    #echo 'Huidige vaste kosten 75  + onderhoud a '.$onderhoud.': <b>'.$costs_pp.'</b> p/m pp' . PHP_EOL.PHP_EOL;
    echo 'Huidige vaste kosten (wegenbelasting en verzekering) is nu EUR 75,- p/m pp'.PHP_EOL;
    #echo 'Huidige onderhoud pp per maand:  '.$onderhoud.PHP_EOL.PHP_EOL;

    echo 'Dus kosten leo omhoog met: '.  $pp2. ' - '.$costs_hard.' = <B>EUR ' . ($raise2 ) .',- </B>'.PHP_EOL.PHP_EOL;
    echo 'Maandbedrag gaat daarmee van 400 naar: '. (400 + $raise2) . ',- p/m'. PHP_EOL . PHP_EOL;

  #  echo 'Als je hier wegvallende onderhouds kosten van af trekt komt het eigenlijk neer op: '.   ((400 + $raise2) - $onderhoud) . ',- p/m'. PHP_EOL ;
    // echo 'Een virtuele verhoging dan van :'. ($raise2- $onderhoud) . ',- p/m'. PHP_EOL . PHP_EOL;

    # WOUTER
    echo '<hr>';
    echo '<b>==> Wouter:</b </br></br></br>';
    #echo 'Wouter verhoging wordt ' . $pp1 . ' - ' . $costs_hard . ' = <B>EUR ' . $raise1 . '</b>'.PHP_EOL . PHP_EOL;
    echo 'Huidige vaste kosten omhoog met ' . $pp1 . ' - ' . $costs_hard . '  = <B>EUR ' . $raise1 . '</b>'.PHP_EOL . PHP_EOL;
    echo 'Virtual Inlay: Wouter maakt maandelijks van auto-rek naar betaalrek over: EUR ' . round($inlaypm) . ',-'.  PHP_EOL.PHP_EOL;
    $finalRaisep1 = round($raise1 - $inlaypm);
    echo 'Dan is wouter zn koopkracht-verlies nog maar geslonken tot: <b> EUR ' . $finalRaisep1 . '</b>' . PHP_EOL . PHP_EOL;
    echo 'Optie: Huidig spaar bedrag van 500 verlagen naar ' . round(500 - $finalRaisep1) . ' en voila, de gevoelsmatige verhoging is: <b>0</b>';

    echo '<hr>';
    echo '<b>==> Overige kosten en besparingen:</b </br></br></br>';

    #diesel_verbuik
    #100km    kms
    $verbruik_diesel = (($diesel_verbruik * $kms) / 100);
    $verbruik_kwh = (($kwh_verbruik * $kms) / 100);
    echo 'Facts: ' . PHP_EOL;
    echo 'Dieselverbuik: ' . $verbruik_diesel . ' Liter <br>';
    echo 'Kwh-verbruik: ' . $verbruik_kwh . ' kWh <br>';

    $dieselkostenperjaar = ($verbruik_diesel * $diesel);
    echo 'Diesel kosten per jaar: ' . ($dieselkostenperjaar) . '<br><br>';


    $totaal_kwh = ($verbruik_kwh + 3000 + $ext_auto);
    $totaal_kwh2 = ($totaal_kwh - $kwh_opbrengst);

    echo 'Stroomverbruik totaal (huis+auto+ext_auto) : ' . $totaal_kwh . ' kWh <br>';
    echo 'Stroomverbruik totaal minus zon-opbrengsten: ' . $totaal_kwh2 . ' kWh <br><br>';

    #   echo 'Stroomkosten minus zon a ' . ($kwh - $kwh_opbrengst) . ' :' . $totaal_kwh2 . '<br><br>';

    echo 'Stroomkosten normaliter a ' . $kwh . ': EUR ' . ($totaal_kwh * $kwh) . ' (uitgaand van huisverbruik van 3000 kwh) <br>';
    echo 'Stroomkosten -zon       a ' . $kwh . ': EUR ' . ($totaal_kwh2 * $kwh) . '<br><br>';

    $kwh = round(($totaal_kwh2 * $kwh) / $totaal_kwh, 2);

    echo 'Door zonnepanelen, hebben we dus uiteindelijk (door terugrekenen) een stroomprijs van: ' . $kwh . ' per kWh<br><br>';

    #  2181,6


    $kosten_thuis_laden = round(((($verbruik_kwh * $ladenthuis) / 100) * $kwh), 2);
    $kosten_extern_laden = (($verbruik_kwh * (100 - $ladenthuis)) / 100) * $kwh_ext;
    echo 'KwH kosten per jaar, thuis(' . $ladenthuis . '%)  : ' . $kosten_thuis_laden . ' Euro  <br>';
    echo 'KwH kosten per jaar, extern(' . (100 - $ladenthuis) . '%)  : ' . $kosten_extern_laden . ' Euro  <br>';

    $kwh_kosten_totaal = ($kosten_thuis_laden + $kosten_extern_laden);
    echo 'KwH kosten per jaar totaal: <b> ' . ($kwh_kosten_totaal) . ' Euro </b> <br>';

    $x = $dieselkostenperjaar - $kwh_kosten_totaal;
    $x_maand = $x / 12;

    echo '<hr>';
    $km_kosten = 0;
    if($kms > $kmrage) {
        $km_kosten = (($kms - $kmrage) * 0.13);
    }

    $opbrengsten = ($ext_auto * (0.45 - $kwh));
    echo '<b>==> De cijfers:</b </br></br></br>';
    echo 'Per jaar:'.PHP_EOL;
    echo 'Diesel/Elektriciteit voordeel:<b> EUR ' . $x . '</b> goedkoper uit' . PHP_EOL;
    echo 'Onderhoudskosten die wegvallen zijn:<b> EUR ' . $onderhoudJaar . '</b>' . PHP_EOL ;
    echo 'Extra opbrengsten ' . $ext_auto . ' kwh a (' . (0.45 - $kwh) . ' cent) is: <b>EUR ' . $opbrengsten . '</b>'.PHP_EOL;
    echo 'Minus kosten voor extra km\'s a 13 cent: <b>EUR ' . $km_kosten . '</b> ' . PHP_EOL.PHP_EOL;

//    echo '<b style="font-size: 15px">';
//    echo 'Totaal voordeel vaste laste per jaar: EUR ' . ($x - $km_kosten + $onderhoudJaar + $opbrengsten) . PHP_EOL;
//    echo 'Per maand: ' . round(($x - $km_kosten + $onderhoudJaar) / 12) . PHP_EOL;
//    echo 'Per maand Per persoon: ' . round(($x - $km_kosten + $onderhoudJaar) / 12) / 2;
//    echo '</b>';

    #echo PHP_EOL.PHP_EOL . 'Dus je kunt stellen dat het wisselen naar elektrisch per jaar ' . ($x - $km_kosten + $onderhoudJaar) . ' euro scheelt. T.o.v. van het behouden van Clio gezien de vaste lasten.'.PHP_EOL;
#    echo 'Wegvallend wegnbelasting zit hier dus niet bij.'.PHP_EOL;
#    echo 'Wel kan het zijn dat er nog wegenbalasting bij komt in het verschiet .';

    echo '<b>Per maand leidt dat tot dit overzicht:</b>'.PHP_EOL.PHP_EOL;


    echo '<table width="30%"><thead><th></th><th>Clio</th><th>EX30</th></thead><tbody>';
    echo '<tr><td>Wegenbelasting</td><td>100</td><td>0</td></tr>';
    echo '<tr><td>Onderhoudskosten</td><td>'.round($onderhoudJaar/12).'</td><td>0</td></tr>';
    echo '<tr><td>Extra km kosten</td><td>0</td><td>'.round($km_kosten/12).'</td></tr>';
    echo '<tr><td>Verzekering</td><td>50</td><td>0</td></tr>';

    echo '<tr><td>Brandstof kosten</td><td>'.round($dieselkostenperjaar/12).'</td><td>'.round($kwh_kosten_totaal/12).'</td></tr>';
    echo '<tr><td>Extra opbrengesten</td><td>0</td><td>-'.round($opbrengsten/12).'</td></tr>';

    $totaala = round( 100 + 50 + ($dieselkostenperjaar/12)  +  ( $onderhoudJaar/12));
    $totaalb = round(( $km_kosten + $kwh_kosten_totaal - $opbrengsten)/12)  ;
//117  / 2 =  58,5

    //w 431,4 - 58,5 = 372,9
    //l = 280,41 - 58,5 = 221,91

    echo '<tr><td colspan="3"><hr></td></tr>';
    echo '<tr><td><b>subTotaal</b></td><td>'.$totaala.'</td><td>'.$totaalb.'</td></tr>';
    echo '<tr><td>Leasekosten</td><td>0</td><td>'.$maandbedrag.'</td></tr>';
    echo '<tr><td colspan="3"><hr></td></tr>';
    $totaalb += $maandbedrag;
    echo '<tr><td><b>Totaal</b></td><td>' . $totaala . '</td><td>' . ($totaalb ) . '</td></tr>';
    echo '</tbody></table>'.PHP_EOL;


    echo 'EX30 is per maand duurder: EUR ' . (($totaalb) - $totaala).PHP_EOL.PHP_EOL;

    echo 'Dus maandbedrag is bekend, wat we moeten betalen. Maar, hoeveel kost het nu uiteindelijk meer (geschat)...'.PHP_EOL;
    echo 'Alles meegerekend zijn dit bedragen die we uiteindelijk meer gaan betalen:'.PHP_EOL;
    echo '<b>Wouter</b> meer tov clio: '. (($totaalb - $totaala)  * $wp).' '.PHP_EOL;
    echo 'Minus virtual inlayo: '. ((($totaalb - $totaala)  * $wp) -  round($inlaypm)  ).' '.PHP_EOL;
    echo 'Minus 100 minder sparen : '. ((($totaalb - $totaala)  * $wp) -  round($inlaypm) - 100  ).' '.PHP_EOL.PHP_EOL;
    echo 'EX 30 kost nu in totaal p/m: 497,0'.PHP_EOL;

    echo PHP_EOL;
    echo '<b>Leo</b> meer tov clio: '. (($totaalb - $totaala)  * (1-$wp)).' '.PHP_EOL;
    echo 'EX 30 kost nu in totaal p/m:  338,9 '.PHP_EOL;
    echo '<hr>';


    echo '<style> th {text-align: right;}  td{text-align: right}  tr td:first-child {text-align: left} </style>';

    exit();

}
?>

<html>
<Style>

    th
    {text-align: left;}
    body {
        padding: 20px;
        line-height: 40px;
        background-color: #4c4c4c;
        color: #f7f7f7;
        font-family: monospace;
    }
    pre
    {
        line-height: normal;
        white-space: pre-line;
    }
    h3
    {
        margin-top :  0;
    }

    l {
        display: inline-block;
        min-width: 170px;
    }

    input[type=text]
    {
        width: 100px;
        text-align: right;
        background-color: transparent;
        color: white;
        padding: 4px 6px;

    }

    span
    {
        background-color: #8c8c8c;
        color: white;
        border-radius: 20px;
        display: inline-block;
        width: 13px;
        height: 13px;
        line-height: normal;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        cursor: default;
    }
    span:hover
    {
 background-color: #333;
    }



</Style>
<body>

<form target="my_frame" method="post" >

    Maandelijkse termijn <input type="text" name="amount" value="719"> <br>
    Wouter aandeel <input type="text" name="wp" value="61"> %<br>
    Looptijd:
    <input type="radio" value="48" name="looptijd" checked/>48
    <input type="radio" value="60" name="looptijd"/>60
    <input type="radio" value="72"  name="looptijd"/>72
    <br>
    <l>Km's per jaar</l> <input type="text" name="kms" value="18000"><br>
    <l>Kms abbo</l> <input type="text" name="kmrage" value="15000"><br>
    <l>Onderhoudskosten clio</l> <input type="text" name="onderhoud" value="1000" ><br>
    <l>Dieselprijs</l>   <input type="text" name="diesel" value="1.90"><br>
    <l>Dieselverbuik</l>   <input type="text" name="diesel_verbruik" value="4.6"> L/100km <br>
    <l>Kwh-prijs</l>     <input type="text" name="kwh" value="0.36"><br>
    <l>Kwh-prijs extern</l>     <input type="text" name="kwh_ext" value="0.51" ><br>
    <l>Percentage thuis laden</l>   <input type="text" name="ladenthuis" value="70"> % <br>
    <l>kWh verbruik</l>   <input type="text" name="kwh_verbruik" value="17"> kwh <br>
    <l>Opbrengst zonnepanelen</l>   <input type="text" name="kwh_opbrengst" value="1500"> kWh per jaar <br>
    <l>Extra kwh <span title="Extra kwh per jaar, door extern laden, bijvoorbeeld auto miek.">i</span> </l>   <input type="text" name="ext_auto" value="200"> kWh per jaar <br>

    <l>Virtual inlay</l> <input type="text" name="inleg" value="7000"><br>
    <!--    Inleg: <input type="text" name="inleg2" ><br>-->

    <input type="submit" name="gew" value="Berekenen" />
</form>



<iframe name="my_frame" id="f1" width="1100" style="position: absolute;left: 540px;top: 32px;height: 1500px;background-color: #ededed;border: 1px;"></iframe>

<pre>

<h3>Care by volvo</h3>
- 48 maanden abonnement
- duurder daardoor in maandkosten: tussen 700/760
- geen BKR
- Moeilijker opzegbaar. Alleen via boete, of overlijden.
- Snelle levering
- auto A: leo van 400 naar += <b>684.5</b> - 50 = 634.50 (A a 719)
- auto B: leo van 400 naar += <b>719.5</b> - 50 = 669,50 (auto B a 789 )
- boeteloop: 11.361,6 / 7574,4 / 3787,2


    <hr>
    Noemenswaardige bijkomstigheden en kanttekeningen
    <ul>
    <li>Onderhoudskosten zullen wegvallen, die anno 2024 met de clio worden geschat op 1000 per jaar, is 41,66 pp p/m </li>
    <li>Extra kilometers: ik schat 3000 extra km\'s, dus 3000*0.13 = 390, /12 /2  = 16,25 pm pp. </li>
    <li>Brandstof kosten besparing van 830 euro (zie hieronder) </li>
    <li>geschat voordel dan 60 euro pp pm</li>
    <li>Wegenbelasting kan er in het verschiet bij komen </li>
    <li>Onbekend hoe lang de energie meter nog terug loopt</li>
    </ul>


    <!---->
<!--<h3>ANWB</h3>-->
<!--- 72 maanden (6 jaar) abonnement mogeljk-->
<!--- inleg mogelijk-->
<!--- met inleg, goedkoop in maandkosten: vanaf 550 (daarmee ook relatief laag in BKR).-->
<!--- wel BKR-->
<!--- opzeggen boete,of overlijden, arbeidsongeschiktheid of relatiebreuk.-->
<!--- op basis van 15.000 tot 20.000 km's. Naheffing kans klein.-->
<!--- levering na enkele maanden (waarschijnlijk)-->
<!--- je lijkt voor de gehele auto te betalen, dus in zn totaliteit betaal he met anwb het meest.-->
<!--- leo van 400 naar += 551.5 (72mndn, minus 50 onderhouds kosten, bij inleg 15K ), of-->
<!--- leo van 400 naar += 564.5 (48mndn, minus 50 onderhouds kosten, bij inleg 15K ), of-->
<!--- leo van 400 naar += 656.5 (72mndn, minus 50 onderhouds kosten, bij inleg 0K ), of-->
<!--- leo van 400 naar += 721,0 (48mndn, minus 50 onderhouds kosten, bij inleg 0K )-->
<!--=> denk mijn favo:je hebt voor 6 jaar een top auto, zonder zorgen. met inleg, zijn de maandkosten laag. Waardoor het ook minder spannend wordt.-->
<!--    Kosten kan ik dan zelfstandig ook dragen.-->
<!---->
<!--<h3>vd WULP</h3>-->
<!--- tot 60 maanden, maar is dan net zo duur als 48 maanden met Care by Volvo-->
<!--- inleg niet mogelijk-->
<!--- wel BKR-->
<!--- opzeggen boete,of overlijden, arbeidsongeschiktheid of relatiebreuk volgens Keurmark en aanvullende voorwaarden private leae.-->
<!--- levering na enkele maanden (waarschijnlijk)-->
<!--- leo van 400 naar += 629,0 (60mndn, minus 50 onderhouds kosten)-->
<!---->




</body>
</html>