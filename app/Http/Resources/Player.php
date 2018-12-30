<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Player extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'team_id' => $this->team_id,
            'games' => $this->games,
            'minutes_per_game' => $this->minutes_per_game,
            'points_per_game' => $this->points_per_game,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'team' => $this->team
        ];
    }
}
