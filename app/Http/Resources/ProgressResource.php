<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgressResource extends JsonResource
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
            'charity_id' => $this->charity_id,
            'charity' => $this->charity,
            'date' => \Carbon\Carbon::parse($this->date)->format('d-m-y'),
            'status' => $this->status,
            'user' => new UserResource($this->user)
        ];
    }
}
