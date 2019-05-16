<?php

use App\Models\User;
use App\Models\Setting;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;

if(! function_exists('hasSlot')){
    function hasSlot(User $user, $datetime){
        return $user->slots()->where('date_time', $datetime)->first();
    }
}


if(! function_exists('getDashBoardLink')){
    function getDashBoardLink(){
        if(Auth::user()){
            if(Auth::user()->type == "administrator"){
                return url("back-end/dashboard");
            }else if(Auth::user()->type == "teacher"){
                return url("teacher/dashboard");
            }else{
                return url("student/dashboard");
            }
        }
    }
}

if(! function_exists('isInCart')){
    function isInCart($slot_id)
    {
        if(Auth::user()){
            return Auth::user()->carts()->where('id', $slot_id)->first() ?  true : false;
        }

        return false;

    }
}


if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new Setting;
        }

        if (is_array($key)) {
            return Setting::set($key[0], $key[1]);
        }

        $value = Setting::get($key);
        return is_null($value) ? value($default) : $value;
    }
}

if(!function_exists('is_desktop'))
{
    function is_desktop()
    {
        $agent = new Agent;
        return $agent->isDesktop();
    }
}


if(! function_exists('menuHighLighter')){
    function menuHighLighter($label, $segment, $return = 'show'){
        if(is_array($label)){
            return  in_array(Request::segment($segment),$label) ? $return : '';
        }else{
            return  Request::segment($segment) == $label ? $return : '';
        }
    }
}


if(! function_exists('back_end_active_menu'))
{
    //retur show
    function back_end_active_menu($label, $segment, $return = 'active'){
        if(is_array($label)){
            return  in_array(Request::segment($segment), $label) ? $return : '';
        }else{
            return  Request::segment($segment) == $label ? $return : '';
        }
    }
}

if(!function_exists('dateFormat')){
    function dateFormat($format, $date){
        return date($format, strtotime($date));
    }
}

if(!function_exists('joinTime')){
    function joinTime($date , $time){
        return  date('Y-m-d H:i:s', strtotime($date . " " . $time));
    }
}


if(!function_exists('time_select'))
{
    function time_select()
    {
        $hour = 06;
        $min = 30;
        $end = 24;

        $result_array = array();

        for($hour; $end > $hour; $hour++)
        {
                for($i = 0; $i < 6; $i++)
                {
                    $min =  $i * 10;
                    if($min == 0)
                    {
                        $min = "00";
                    }

                    $time = $hour . ":". $min  . ":00";
                    
                    if($hour + 1 >= $end)
                    {
                        $last_time =  $hour . ":00:00";
                        array_push($result_array, $last_time);
                        break;
                    }else{
                        array_push($result_array, $time);
                    }
                }
        }

        return $result_array;
    }
}

if(!function_exists('timeSequence'))
{
    function timeSequence()
    {
        $hour = 06;
        $min = 30;
        $end = 24;

        $result_array = array();

        for($hour; $end > $hour; $hour++)
        {
                for($i = 0; $i < 2; $i++)
                {
                    $min =  $i * 30;
                    if($min == 0)
                    {
                        $min = "00";
                    }

                    $time = $hour . ":". $min  . ":00";
                    
                    if($hour + 1 >= $end)
                    {
                        $last_time =  $hour . ":00:00";
                        array_push($result_array, $last_time);
                        break;
                    }else{
                        array_push($result_array, $time);
                   }
                }
        }

        return $result_array;
    }
}

