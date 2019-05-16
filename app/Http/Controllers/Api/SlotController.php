<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlotController extends Controller
{
    function slotTable(Request $request)
    {

        return [
            [ 'name' => "jofie"],
            [ 'name' => "jofie"],
            [ 'name' => "jofie"],
        ];
        
        $now = Carbon::now();
        
        if($request->week){
            $weekNumber = $request->week;
        }else{
            $weekNumber = $now->weekOfYear;
        }

        $array = array();
        $dates = CarbonPeriod::create($this->getFirstDate($weekNumber), $this->getSecondDate($weekNumber))->toArray();

        foreach($dates as $date){
            array_push($array, [
                'date_title' => date('m/d D',strtotime($date)),
                'date_format' => date('Y-m-d',strtotime($date)),
                'day_number' => date('N',strtotime($date)),
            ]);
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
