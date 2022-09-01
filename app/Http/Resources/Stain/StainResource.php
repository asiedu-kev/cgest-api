<?php

namespace App\Http\Resources\Stain;

use Illuminate\Http\Resources\Json\JsonResource;

class StainResource extends JsonResource
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
            'task_name' => $this->task_name,
            'module_id' => $this->module_id,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
