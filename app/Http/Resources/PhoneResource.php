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
                'phone_type'=>$this->phone1_type,
                'phone_tag'=>$this->when($this->phone1_tag, $this->phone1_tag, "not verified")
            ],
            [
                'phone'=>$this->phone2,
                'phone_type'=>$this->phone2_type,
                'phone_tag'=>$this->phone2_tag
            ],
            [
                'phone'=>$this->phone3,
                'phone_type'=>$this->phone3_type,
                 'phone_tag'=>$this->phone3_tag
            ],
            [
                'phone'=>$this->phone4,
                'phone_type'=>$this->phone4_type,
                 'phone_tag'=>$this->phone4_tag
            ],
            [
                'phone'=>$this->phone5,
                'phone_type'=>$this->phone5_type,
                 'phone_tag'=>$this->phone5_tag
            ],
            [
                'phone'=>$this->phone6,
                'phone_type'=>$this->phone6_type,
                 'phone_tag'=>$this->phone6_tag
            ],
        ];
    }
}
