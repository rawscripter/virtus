<?php

namespace App\Http\Resources;

use App\Models\PropertyAddress;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'id' => $this->id,
            'contact'=>
                [
                    'full_name'=> $this->first_name . ' ' . $this->last_name,
                    'first_name'=>$this->first_name,
                    'last_name'=>$this->last_name,
                ],
            'mailing' =>
                [
                    'street'=>$this->mailing_address,
                    'city'=>$this->mailing_city,
                    'state'=>$this->mailing_state,
                    'zip'=>$this->mailing_zip,
                ],
            'phones'=> PhoneResource::collection($this->phones),
            'addresses'=> PropertyAddressResource::collection($this->propertyAddresses),
            'campaigns'=> CampaignResource::collection($this->campaigns),
            'created' => $this->created_at,
            'updated' => $this->updated_at
        ];
    }
}
