<?php

namespace App\Traits;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

trait HasSlotUtility{

    function getMonthDateSlot($weeknumber){
        $array = array();
        
        $dates = CarbonPeriod::create( $this->getFirstDate($weeknumber), $this->getSecondDate($weeknumber) );

        //formatting Dates
        foreach($dates as $date){
            $array[] = $date->format('Y-m-d');
        }

        return $array;
    }

    function getFirstDate($weekNumber){
        $now = Carbon::now();
        return $now->setISODate($now->year, $weekNumber)->startOfWeek()->format('Y-m-d');
    }

    function getSecondDate($weekNumber){
        $now = Carbon::now();
        return $last_day = $now->setISODate($now->year, $weekNumber + 1)->endOfWeek()->format('Y-m-d');
    }
}