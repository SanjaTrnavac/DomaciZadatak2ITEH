<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'player';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'date_of_birth'=>$this->resource->date_of_birth,
            'euro_net_worth'=>$this->resource->euro_net_worth,
            'club'=>$this->resource->club,
            'manager' => new ManagerResource($this->resource->manager)
        ];
    }
}
