<?php

namespace App\Helpers\Calendar;

use App\Event;

class Events {

    /**
     * recupere les evenements entre deux dates
     * 
     */
    public function getEventsBetween (\DateTime $start, \DateTime $end ): array{
        $sql = Event::whereBetween('start', array($start->format('Y-m-d 00:00:00'), $end->format('Y-m-d 23:59:59')) )->get();
        var_dump($sql);
        return [];
    }


}