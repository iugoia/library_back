<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbacksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user->login,
            'book' => $this->book->name,
            'score' => $this->score,
            'message' => $this->message
        ];
    }
}
