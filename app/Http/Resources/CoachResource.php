<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
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
            'matery' => $this->matery,
            'date' => $this->date,
            'attendance' => \Carbon\Carbon::parse($this->attendance)->format('H:i'),
            'information' => $this->information,
            'signature' => $this->signature,
            'user' => new UserResource($this->user)
        ];
    }
}
