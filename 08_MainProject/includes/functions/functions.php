<?php
function productsJSON(&$tickets, &$shirtOrder = 0, &$labelOrder = 0)
{
    $days = array(0 => "dayPass", 1 => "allPass", 2 => "day2Pass");
    $totalTickets = array_combine($days, $tickets);

    // Convert array to JSON
    $array2Json = array();
    foreach ($totalTickets as $key => $tickets_intern) {
        if ((int) $tickets_intern['amount'] > 0) {
            $array2Json[$key] = (int) $tickets_intern['amount'];
        }
    }
    // Add the optional orders
    $shirtOrder = (int) $shirtOrder;
    if ($shirtOrder > 0) {
        $array2Json['shirtOrder'] = $shirtOrder;
    }
    $labelOrder = (int) $labelOrder;
    if ($labelOrder > 0) {
        $array2Json['labelOrder'] = $labelOrder;
    }

    return json_encode($array2Json);
}

function eventJSON($events)
{
    $eventArray2Json = array();
    foreach ($events as $event) {
        $eventArray2Json['eventos'][] = $event;
    }

    return json_encode($eventArray2Json);
}
