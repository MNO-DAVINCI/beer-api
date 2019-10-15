<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Beer extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'style' => $this->style,
            'volume' => $this->volume,
            'abv' => $this->abv,
        ];
    }
}
