<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PercentageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'performance_id' => $this->performance_id,
            'performance' => $this->performance,
            'percent' => $this->percent,
            'user' => new UserResource($this->user)
        ];
    }
}
