<?php


$es = 100;
$extra_aflos = 340;
if (isset($_REQUEST['calcy']))
{
    $ni = $_REQUEST['inlegcustom'];
    $extra_aflos = $_REQUEST['extra_aflos'];
    $extra_aflo_jaar = $_REQUEST['extra_aflo_jaar'];
    $es = $_REQUEST['es'];
}

$p = 1.0019;
$inleg = 400.43;
//$inleg = 350.43;
#$$subtotaal = 24424;


#$p = 1.048;
#$inleg = 155;
$subtotaal = 24424;


echo '<pre>Berekeningen vanaf 2021, reeds gespaard: EUR 24.424' . PHP_EOL . PHP_EOL;
echo 'De rente bepaald je rentekosten, maar ook je spaar opbrensten' . PHP_EOL . PHP_EOL;
echo 'Dus lagere rente, is minder kosten, maar ook minder opbrensten voor sparen, daarom wordt in dat geval spaarbedrag verhoogt, om tot het beooogd kapitaal te komen' . PHP_EOL . PHP_EOL;

echo '<b>Eerste prognose van de bank, met iets hogere rente a 4.8%</b>' . PHP_EOL;
//showit(155.08, 1.048, 639, 240);

echo PHP_EOL;
echo '<b>Met goede cijfers a 4.6% rente voor 10 jaar vast:</b>' . PHP_EOL;
//showit(159.84, 1.046, 612, 215);




#echo PHP_EOL;
#echo '1.8% 15 jaar vast :' . PHP_EOL;
#showit(287.87,  1.018, 239.76, 70);

echo PHP_EOL;
echo '<b>Update, nieuwe rente van 1.9%, 20 jaar vast, vanaf 2021:</b>' . PHP_EOL;
echo '<b>Er is op 12-04-2026 extra afgelost: 340,- euro via ideal</b>' . PHP_EOL;
#showit(155.08, 1.046, 612, 215, true);
//showit(277.87, 1.019, 253.08, 88);

echo PHP_EOL;
//echo '<form method="post" style="padding-left: 0px">';
//echo '<b>Nieuwe prognose met rente 1.9% voor 20 jaar vast + extra sparen </b> <Br>';
//echo 'Van 278 naar <input type="text" value="' . $ni . '"  name="inlegcustom" style="width: 100px"/> sparen <br>';
//echo 'eenmalig aflossen  <input type="text" value="' . $extra_aflos . '"  name="extra_aflos" style="width: 100px"/>  <br>';
//echo 'jaarlijks aflossen  <input type="text" value="' . $extra_aflo_jaar . '"  name="extra_aflo_jaar" style="width: 100px"/>  <br>';
//echo 'extern sparen  <input type="text" value="' .($es) . '"  name="es" style="width: 100px"/>  <br>';
////echo 'of (ook) nog eenmaalig aflossen <input type="text" value="' . $extra_aflos . '"  name="extra_aflos" style="width: 100px"/> : ' . PHP_EOL;
//echo '<input type="submit" name="calcy" value="Bereken"/>  ' . PHP_EOL;
//echo '</form>';
//showit(390, 1.019, 253.08, 88, true);
//showit(159.84, 1.046, 612, 215, true, $ni ?? 0, $extra_aflos ?? 0, $extra_aflo_jaar ?? 0, $es ?? 0);

$config_1 = [
        'start_year' => 2011,
        'end_year' => 2041,
        'start_month' => 11,
        'hypotheek' => 159840,
        'start_saldo' => 0,
        'nog_sparen' => true,
        'inleg' => 155.08,
        'rente_factor' => 1.048,
        'spaar_doel' => 90000,
        'fiscaal_percentage' => 0.35,
        'fiscaal_actief' => true,
        'extra_sparen_per_maand' => 0,
];

$events_1 = [
        //['date' => '2021', 'type' => 'set_inleg', 'value' => 277.87],
        //['date' => '2021', 'type' => 'set_rente_factor', 'value' => 1.019],
    // voorbeeld:
    // ['date' => '2025', 'type' => 'set_inleg', 'value' => 300],
    // ['date' => '2025', 'type' => 'extra_aflossing_jaarlijks', 'value' => 1000],
    // ['date' => '2026', 'type' => 'extra_aflossing_eenmalig', 'value' => 5000],
    // ['date' => '2026-06', 'type' => 'extra_storting', 'value' => 2500],
];


$config_real = [
        'start_year' => 2011,
        'end_year' => 2041,
        'start_month' => 11,
        'hypotheek' => 159840,
        'start_saldo' => 0,
        'nog_sparen' => true,
        'inleg' => 159.84,
        'rente_factor' => 1.046,
        'spaar_doel' => 90000,
        'fiscaal_percentage' => 0.35,
        'fiscaal_actief' => true,
        'extra_sparen_per_maand' => 0,
];

$events_real = [
        ['date' => '2021-01', 'type' => 'set_rente_factor', 'value' => 1.019],
        ['date' => '2021-01', 'type' => 'set_inleg', 'value' => 278.25],


        ['date' => '2024-05', 'type' => 'extra_sparen_storting', 'value' => 1900,'desc'=>'start-inleg voor hypotheek potje'],  // eerste storting hypotheek potje
        ['date' => '2024-06', 'type' => 'set_extra_sparen_per_maand', 'value' => 100,  'desc'=>'100 pm voor hypotheek potje' ], // 100 p/m vanaf nu
        ['date' => '2025-01', 'type' => 'extra_sparen_storting', 'value' => 18.66, 'desc'=>'rente 2024'], // rente in januari
        ['date' => '2026-01', 'type' => 'extra_sparen_storting', 'value' => 37.10, 'desc'=>'rente 2025'], // rente in januari

        ['date' => '2026-04', 'type' => 'set_extra_sparen_per_maand', 'value' => 250,  'desc'=>'100 pm gewijzigd naar 250 voor hypotheek potje' ], // 100 p/m vanaf nu

        ['date' => '2026-04', 'type' => 'extra_sparen_storting', 'value' => 300.00, 'desc'=>'over van maandloon'], // rente in januari




        //['date' => '2030-04', 'type' => 'set_extra_sparen_per_maand', 'value' => 100,  'desc'=>'100 pm gewijzigd naar 100 voor hypotheek potje' ], // 100 p/m vanaf nu

        //['date' => '2026-09', 'type' => 'extra_sparen_storting', 'value' => -2010], // rente in januari


        ['date' => '2026-04', 'type' => 'extra_aflossing', 'value' => 340, 'desc' => 'afgelost dus van de schuld'],
        //['date' => '2029-04', 'type' => 'extra_aflossing', 'value' => 3340, 'desc' => 'afgelost dus van de schuld'],

        ['date' => '2034-01', 'type' => 'extra_aflossing', 'value' => 15000, 'desc' => '15.000 afgelost via hypotheek pot, omdat het jaar later teveel zou zijn voor boetevrij aflossen'],
        ['date' => '2034-01', 'type' => 'extra_sparen_storting', 'value' => -15000, 'desc' => '15.000 afgehaald van extra sparen potje'],

        ['date' => '2036', 'type' => 'set_fiscaal_actief', 'value' => 0],
    //    ['date' => '2040', 'type' => 'set_fiscaal_actief', 'value' => 1],

          //['date' => '2026-03', 'type' => 'extra_storting', 'value' => 5000], // storing naar de opbouw rekeing
];

//showit($config_1, []);
echo '<h3>Het voorbeeld zoal geschets door de rabobank, met een iets andere inleg en rente(4.8%)</h3>';

showit($config_1,[]);

echo '<h3>Zoals het is. Gestart met 4.6% rente, en spaarinleg van 159,08 </h3>';

echo PHP_EOL . "=== EVENTS ===" . PHP_EOL;
printEventsReadable($events_real);
echo PHP_EOL;

showit($config_real, $events_real);


?>
<Style>
    body{background-color: #222; color: #CCC}

    input[type=text]
    {
        background-color: #555;
        color: white;
    }
    h3{color: yellowgreen}
</Style>
<?php

function printEventsReadable(array $events): void
{
    usort($events, fn($a, $b) => strcmp($a['date'], $b['date']));

    foreach ($events as $event) {
        $date = $event['date'];
        $type = $event['type'];
        $value = $event['value'] ?? null;
        $desc = $event['desc'] ?? '';

        switch ($type) {
            case 'set_rente_factor':
                echo "$date: rente gewijzigd naar " . (($value - 1) * 100) . "%";
                break;

            case 'set_inleg':
                echo "$date: maandelijkse inleg → €" . number_format($value, 2, ',', '.');
                break;

            case 'set_extra_sparen_per_maand':
                echo "$date: extra sparen p/m → €" . number_format($value, 2, ',', '.');
                break;

            case 'extra_sparen_storting':
                echo "$date: extra storting sparen → €" . number_format($value, 2, ',', '.');
                break;

            case 'extra_storting':
                echo "$date: extra storting → €" . number_format($value, 2, ',', '.');
                break;

            case 'extra_aflossing':
                echo "$date: extra aflossing → €" . number_format($value, 2, ',', '.');
                break;

            case 'extra_aflossing_jaarlijks':
                echo "$date: jaarlijkse extra aflossing → €" . number_format($value, 2, ',', '.');
                break;

            case 'extra_aflossing_eenmalig':
                echo "$date: eenmalige aflossing → €" . number_format($value, 2, ',', '.');
                break;

            case 'set_fiscaal_actief':
                echo "$date: fiscaal voordeel " . ($value ? 'AAN' : 'UIT');
                break;

            default:
                echo "$date: $type ($value)";
        }

        if(!empty($desc)) {
            echo ' -> ' . $desc;
        }

        echo PHP_EOL;
    }
}


/**
 * Simuleert hypotheek/sparen per maand.
 *
 * Idee:
 * - Je geeft een startconfig mee
 * - Je geeft maandelijkse wijzigingen mee:
 *   - rente wijziging
 *   - inleg wijziging
 *   - fiscale voordeel percentage wijziging
 *   - extra storting
 *   - extra aflossing
 * - Per maand wordt alles verwerkt
 * - Per jaar wordt een regel getoond
 *
 * Datums altijd als YYYY-MM.
 */
function showit(array $config, array $events = []): void
{
    echo str_pad('Jaar', 7, ' ', STR_PAD_RIGHT);
    echo str_pad('Rente', 14, ' ', STR_PAD_RIGHT);
    echo str_pad('Schuld', 20, ' ', STR_PAD_RIGHT);
    echo str_pad('Gespaard', 14, ' ', STR_PAD_RIGHT);
    echo str_pad('Rentebedrag', 14, ' ', STR_PAD_RIGHT);
    echo str_pad('Sparen', 10, ' ', STR_PAD_RIGHT);
    echo str_pad('Extra Sparen', 15, ' ', STR_PAD_RIGHT);
    echo str_pad('Fiscaal Voordeel', 20, ' ', STR_PAD_RIGHT);
    echo str_pad('Netto maandlasten', 17, ' ', STR_PAD_RIGHT);
    echo PHP_EOL;

    $totalRente = 0;
    $totalInleg = 0;
    $totalFiscaal = 0;
    $totalExtraSparen = 0;
    $totalAflossing = 0;

    $startYear  = (int)($config['start_year'] ?? 2011);
    $endYear    = (int)($config['end_year'] ?? 2041);
    $startMonth = (int)($config['start_month'] ?? 1);

    $hypo = (float)($config['hypotheek'] ?? 0);
    $subtotaal = (float)($config['start_saldo'] ?? 0);
    $nogSparen = (bool)($config['nog_sparen'] ?? true);

    $inleg = (float)($config['inleg'] ?? 0);
    $p = (float)($config['rente_factor'] ?? 1.0);

    $esPerMaand = (float)($config['extra_sparen_per_maand'] ?? 0);
    $esRealy = (float)($config['extra_sparen_start_saldo'] ?? 0);

    $spaarDoel = (float)($config['spaar_doel'] ?? 90000);
    $fiscaalPercentage = (float)($config['fiscaal_percentage'] ?? 0.35);
    $fiscaalActief = (bool)($config['fiscaal_actief'] ?? true);

    $eenmaligeEventsGedaan = [];

    $eventsByDate = [];
    foreach ($events as $event) {
        if (empty($event['date']) || empty($event['type'])) {
            continue;
        }
        $eventsByDate[$event['date']][] = $event;
    }

    $applyEvents = function (
            string $dateKey,
            bool $isMonthLevel = false
    ) use (
            &$eventsByDate,
            &$p,
            &$inleg,
            &$hypo,
            &$esPerMaand,
            &$esRealy,
            &$fiscaalPercentage,
            &$fiscaalActief,
            &$subtotaal,
            &$eenmaligeEventsGedaan
    ): void {
        if (empty($eventsByDate[$dateKey])) {
            return;
        }

        foreach ($eventsByDate[$dateKey] as $idx => $event) {
            $type = $event['type'];
            $value = (float)($event['value'] ?? 0);
            $eventId = $dateKey . '#' . $idx;

            switch ($type) {
                case 'set_rente_factor':
                    $p = $value;
                    break;

                case 'set_inleg':
                    $inleg = $value;
                    break;

                case 'set_fiscaal_percentage':
                    $fiscaalPercentage = $value;
                    break;

                case 'set_fiscaal_actief':
                    $fiscaalActief = !empty($event['value']);
                    break;

                case 'set_extra_sparen_per_maand':
                    $esPerMaand = $value;
                    break;

                case 'extra_sparen_storting':
                    $esRealy += $value;
                    break;

                case 'extra_storting':
                    if ($isMonthLevel) {
                        $subtotaal += $value;
                    }
                    break;

                case 'extra_aflossing':
                    if ($isMonthLevel) {
                        $hypo -= $value;
                        if ($hypo < 0) {
                            $hypo = 0;
                        }
                    }
                    break;

                case 'extra_aflossing_jaarlijks':
                    if (!$isMonthLevel) {
                        $hypo -= $value;
                        if ($hypo < 0) {
                            $hypo = 0;
                        }
                    }
                    break;

                case 'extra_aflossing_eenmalig':
                    if (!isset($eenmaligeEventsGedaan[$eventId])) {
                        $hypo -= $value;
                        if ($hypo < 0) {
                            $hypo = 0;
                        }
                        $eenmaligeEventsGedaan[$eventId] = true;
                    }
                    break;
            }
        }
    };

    for ($jaar = $startYear; $jaar <= $endYear; $jaar++) {
        $monthsThisYear = ($jaar === $startYear) ? (13 - $startMonth) : 12;
        $firstMonthThisYear = ($jaar === $startYear) ? $startMonth : 1;

        $esm = 0.0;
        $rentebedrag = 0.0;
        $voordeel = 0.0;

        $yearKey = sprintf('%04d', $jaar);
        $applyEvents($yearKey, false);

        for ($offset = 0; $offset < $monthsThisYear; $offset++)
        {
            $laatsteAflossing = 0.0;

            $month = $firstMonthThisYear + $offset;
            $monthKey = sprintf('%04d-%02d', $jaar, $month);

            $applyEvents($monthKey, true);

            if ($nogSparen && $subtotaal >= $spaarDoel) {
                $hypo -= $subtotaal;
                $hypo -= $esRealy;

                if ($hypo < 0) {
                    $hypo = 0;
                }

                $subtotaal = 0;
                $esRealy = 0;
                $esPerMaand = 0;
                $nogSparen = false;
            }

            $rentebedrag = ($hypo * ($p - 1)) / 12;
            $voordeel = $fiscaalActief ? round($rentebedrag * $fiscaalPercentage) : 0;

            $esm = 0;
            if ($nogSparen && $esPerMaand != 0) {
                $esRealy += $esPerMaand;
                $esm = $esPerMaand;
            }

            if ($nogSparen) {
                // sparen fase
                $maandFactor = 1 + (($p - 1) / 12);
                $subtotaal += $inleg;
                $subtotaal *= $maandFactor;
            } else {
                // aflosfase (lineair)
                $resterendeMaanden = (($endYear - $jaar) * 12) + (12 - $month + 1);

  ///              $laatsteAflossing = 0.0;
//
                if ($resterendeMaanden > 0 && $hypo > 0) {
                    $aflossing = $hypo / $resterendeMaanden;
                    $hypo -= $aflossing;
                    $laatsteAflossing = $aflossing;
                    $totalAflossing += $aflossing;
                    if ($hypo < 0) {
                        $hypo = 0;
                    }
                }
            }

            $totalRente += $rentebedrag;
            $totalFiscaal += $voordeel;

            if ($nogSparen) {
                $totalInleg += $inleg;
            }

            if ($esm > 0) {
                $totalExtraSparen += $esm;
            }
        }

        $printInleg = $nogSparen ? $inleg : 0;
        //$nettoMaandlasten = $printInleg + $rentebedrag - $voordeel + $esm;
        $nettoMaandlasten = $printInleg + $rentebedrag - $voordeel + $esm + $laatsteAflossing;

        echo str_pad((string)$jaar, 7, ' ', STR_PAD_RIGHT);
        echo str_pad($p . ' %', 14, ' ', STR_PAD_RIGHT);
        echo str_pad(number_format($hypo, 0, ',', '.'), 10, ' ', STR_PAD_LEFT);
        echo str_pad(number_format(round($subtotaal), 0, ',', '.') . ' ', 14, ' ', STR_PAD_LEFT);
        echo str_pad(number_format($rentebedrag, 0, ',', '.'), 14, ' ', STR_PAD_LEFT);
        echo str_pad(number_format($printInleg, 0, ',', '.') . ' ', 10, ' ', STR_PAD_LEFT);
        echo str_pad(number_format($esRealy, 0, ',', '.') . ' ', 15, ' ', STR_PAD_LEFT);
        echo str_pad((string)$voordeel, 20, ' ', STR_PAD_LEFT);
        echo str_pad(number_format($nettoMaandlasten, 2, ',', '.'), 17, ' ', STR_PAD_LEFT);
        echo PHP_EOL;
    }
    echo PHP_EOL;
    echo "----------------------------------------" . PHP_EOL;

    $eenmaligeKosten = 2477 + 1598; // afsluit + NHG (pas aan indien nodig)
    $totaleInleg = $totalInleg + $totalExtraSparen;

    //$bankTotaal = $totalRente + $eenmaligeKosten + $totaleInleg;

    $bankTotaal = $totalRente + $eenmaligeKosten + $totaleInleg + $totalAflossing;

    echo "Totale rente:               €" . number_format($totalRente, 2, ',', '.') . PHP_EOL;
    echo "Totale eenmalige kosten:    €" . number_format($eenmaligeKosten, 2, ',', '.') . PHP_EOL;
    echo "Totale inleg (opbouw):      €" . number_format($totaleInleg, 2, ',', '.') ;
    echo " (Waarvan vaste (spaar) inleg €" . number_format($totalInleg, 2, ',', '.')  . ' en ';
    echo "waarvan extra sparen en aflossen €" . number_format($totalExtraSparen, 2, ',', '.') .')'. PHP_EOL;
    //echo "Restschuld einde looptijd:  €" . number_format($hypo, 2, ',', '.') . PHP_EOL;
    echo "Totale aflossing eindfase:  €" . number_format($totalAflossing, 2, ',', '.') . PHP_EOL;
    echo "----------------------------------------" . PHP_EOL;
    echo "Totaal (zonder fiscaal):    €" . number_format($bankTotaal, 2, ',', '.') . PHP_EOL;

    $bankTotaalMetFiscaal = $bankTotaal - $totalFiscaal;

    echo "Totaal fiscaal voordeel:     €" . number_format($totalFiscaal, 2, ',', '.') . PHP_EOL;
    echo "----------------------------------------" . PHP_EOL;
    echo "Totaal (met fiscaal):        €" . number_format($bankTotaalMetFiscaal, 2, ',', '.') . PHP_EOL;


}