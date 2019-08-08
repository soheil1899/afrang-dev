<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReporterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *                     name:null,


     */
    public function toArray($request)
    {
        return [
                'id'=>$this->id,
                'family'=>$this->family,
                'slogan'=>$this->slogan,
                'actived'=>$this->actived,
                'sex'=>$this->sex,
                'job'=>$this->job,
                 'name'=>$this->toUser[0]->name,
                'email'=>$this->toUser[0]->email,
                'phone'=>$this->toUser[0]->phone,
                'mobile'=>$this->toUser[0]->mobile,
            ];
    }
}
