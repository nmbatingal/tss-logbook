<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id' => $this->client->id,
            'name' => $this->client->full_name,
            'queue' => $this->queue_code,
            // 'queue' => $this->queue_code,
        ];
    }
}
