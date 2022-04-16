<?php

namespace App\Http\Resources\Invoice;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'intitled' => $this->intitled,
            'client_name' => $this->client_name,
            'designation' => $this->designation,
            'amount' => $this->amount,
            'amount_in_letter' => $this->amount_in_letter,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
