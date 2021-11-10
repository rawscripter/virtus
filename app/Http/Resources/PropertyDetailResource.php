<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetailResource extends JsonResource
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
            [
                'id'=> $this->id,
                'address_id'=> $this->property_address_id,
                'details' => $this->details,
                'created' => $this->created_at,
                'updated' => $this->updated_at
            ],
        ];
    }
}
