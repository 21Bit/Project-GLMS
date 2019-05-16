<?php

namespace App\Http\Resources\Transaction;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
        return [
            'id' => $this->id,
            'reference_number' => $this->reference_number,
            'user_id' => $this->user_id,
            'user'    => optional(User::find($this->user_id))->name,
            'count'   => $this->count,
            'processed_by' => $this->processed_by,
            'processed_by_user' => optional(User::find($this->processed_by))->name,

            'payment_method' => strtoupper($this->payment_method),
            'payment_gateway' => $this->payment_gateway,

            'status' => $this->status,
            'data' => $this->data,
            'note' => $this->note,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
