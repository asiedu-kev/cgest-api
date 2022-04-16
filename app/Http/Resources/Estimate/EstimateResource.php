<?php

namespace App\Http\Resources\Estimate;

use Illuminate\Http\Resources\Json\JsonResource;

class EstimateResource extends JsonResource
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
            'module_name' => $this->module_name,
            'client_name' => $this->client_name,
            'designation' => $this->designatin,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'amount' => $this->amount,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
