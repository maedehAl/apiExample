<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return[
            'title'=>$this->title,
            'body'=>$this->body,
            'createdTime' =>jdate($this->created_at)->format('datetime'),
            'episodes'=>new EpisodeCollection($this->episodes)
        ];
    }
}
