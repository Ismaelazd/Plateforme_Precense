<?php

namespace App\Helpers\Calendar;

use App\Event;

class Events {

    /**
     * recupere les evenements entre deux dates
     * 
     */
    public function getEventsBetween (\DateTime $start, \DateTime $end ){
        $sql = Event::whereBetween('start', array($start->format('Y-m-d 00:00:00'), $end->format('Y-m-d 23:59:59')) )->get();
        
        // $pdo = new \PDO('mysql:host=127.0.0.1;dbname=plateformepresence', 'root' , '', [
        //     \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        //     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        // ]);
        // $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')} AND '{$end->format('Y-m-d 23:59:59')}";
        return $sql;
    }
    
    /**
     * recupere les evenements entre deux dates indexés par jour
     * 
     */
    public function getEventsBetweenByDay (\DateTime $start, \DateTime $end ): array{
        
        $events = $this->getEventsBetween($start,$end);
        $days = [];
        foreach ($events as $event) {
            $date = explode(' ',$event['start'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            }else {
                $days[$date][]= $event;
            }
        }
        return $days;
    }


}