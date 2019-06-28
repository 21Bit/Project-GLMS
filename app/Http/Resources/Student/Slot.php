<?php

namespace App\Http\Resources\Student;

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
        // return parent::toArray($request);
        return [
            'id'    => $this->id,
            'title' => strtoupper($this->teacher->name),
            'imageurl' => $this->teacher->getPicturePath(false),
            'status' => strtoupper($this->attendance_status),
            'start' => joinTime($this->date_time, $this->time),
            'end'   => date('Y-m-d H:i:s', strtotime("+" . $this->minutes." minutes ". joinTime($this->date_time, $this->time)))
        ];
    }
}
