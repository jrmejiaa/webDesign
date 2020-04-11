<?php 
    function productsJSON(&$tickets,&$shirtOrder = 0,&$labelOrder = 0)
    {
        $days = array(0 => "dayPass", 1 => "allPass", 2 => "day2Pass");
        $totalTickets = array_combine($days,$tickets);
        
        // Convert array to JSON
        $json = array();
        foreach ($totalTickets as $key => $tickets_intern) {
            if ((int) $tickets_intern > 0) {
                $json[$key] = (int) $tickets_intern;
            }
        }
        // Add the optional orders
        $shirtOrder = (int) $shirtOrder;
        if ($shirtOrder > 0) {
            $json['shirtOrder'] = $shirtOrder;
        }
        $labelOrder = (int) $labelOrder;
        if ($labelOrder > 0) {
            $json['labelOrder'] = $labelOrder;
        }

        return json_encode($json);
    }

    function eventJSON($events)
    {
        $eventJSON = array();
        foreach ($events as $event) {
            $eventJSON['eventos'][] = $event;
        }

        return json_encode($eventJSON);
    }
?>