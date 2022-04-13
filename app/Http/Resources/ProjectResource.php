<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'projectName' => $this-> projectName,
            'location' => $this-> location,
            'area' => $this-> location,
            'budget' => $this-> budget,
            'startDate' => $this-> startDate,
            'finishDate' => $this-> finishDate,
            'planLink' => $this-> planLink,
            // 'surname' => $this->surname,
            // 'name' => $this->name,
            // 'email' => $this->email,
            // // $table->string('role');
            // 'role' => $this->role,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];

    }
}
