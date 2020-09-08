<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class PropertyAddressResource extends JsonResource
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
                'full_address' => $this->property_address . ' ' . $this->property_city   . ' ' .  $this->property_state . ' ' .$this->property_zip,
                'street'=>$this->property_address,
                'city'=>$this->property_city,
                'state'=>$this->property_state,
                'zip'=>$this->property_zip,
                'details'=> new PropertyDetailResource($this->details),
                'owners' =>  $this->owners,
                'created' => $this->created_at,
                'updated' => $this->updated_at
            ],
        ];
    }
}

