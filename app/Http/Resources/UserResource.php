<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'email' => $this->email,
            // $table->string('role');
            'role' => $this->role,
            'password' => $this -> password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
