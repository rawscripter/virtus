<?php

namespace App\Http\Resources;

use App\Models\Campaign;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\This;

class CampaignResource extends JsonResource
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
            'name'=>$this->name,
            'size'=>sizeof($this->owners),
            'list_id'=>$this->list_id,
            'created'=> date('F d, Y', strtotime($this->created_at)),
            'updated'=> date('F d, Y', strtotime($this->updated_at)),
         //   'owners' => OwnerResource::collection($this->whenLoaded('owners'))
        ];
    }
}
