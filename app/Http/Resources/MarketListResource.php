<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarketListResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->market,
            'properties'=> $this->propertyAddresses,
            'created'=> date('F d, Y', strtotime($this->created_at)),
            'updated'=> date('F d, Y', strtotime($this->updated_at)),
        ];
    }
}
