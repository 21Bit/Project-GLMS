<?php

namespace App\Http\Resources\FrontEnd\Cart;

use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
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
           'id' => $this->id,
           'user' => $this->user,
           'slot'   => $this->slot,
           'created_at' => $this->created_at,
       ];
    }
}
