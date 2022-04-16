<?php

namespace App\Http\Resources\Project;

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
            'project_name' => $this->project_name,
            'location' => $this->location,
            'area' => $this->area,
            'budget' => $this->budget,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
            'plan_link' => $this->plan_link,
        ];
    }
}