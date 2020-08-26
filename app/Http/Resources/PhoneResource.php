<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
                'phone'=>$this->phone1,
                'phone_type'=>$this->phone1_type
            ],
            [
                'phone'=>$this->phone2,
                'phone_type'=>$this->phone2_type
            ],
            [
                'phone'=>$this->phone3,
                'phone_type'=>$this->phone3_type
            ],
            [
                'phone'=>$this->phone4,
                'phone_type'=>$this->phone4_type
            ],
            [
                'phone'=>$this->phone5,
                'phone_type'=>$this->phone5_type
            ],
            [
                'phone'=>$this->phone6,
                'phone_type'=>$this->phone6_type
            ],
        ];
    }
}
