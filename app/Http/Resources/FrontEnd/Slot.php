<?php

namespace App\Http\Resources\FrontEnd;

use Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class Slot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'title' => strtoupper($this->attendance_status),
            'status' => strtoupper($this->attendance_status),
            'time_title' => strtoupper($this->attendance_status),
            'start' => joinTime($this->date_time, $this->time),
            'end'   => date('Y-m-d H:i:s', strtotime("+" . $this->minutes." minutes ". joinTime($this->date_time, $this->time))),
            'selected' => $this->inCart($this->id)
        ];
    }

    function inCart($id){
        if(Auth::user()){
            return Auth::user()->carts()->where("slot_id", $id)->first() ? true : false;
        }else{
            return false;
        }
    }
}
