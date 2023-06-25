<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'author_id' => $this->author,
            'genre' => $this->genre,
            'rack' => $this->rack,
            'shelf' => $this->shelf,
            'row' => $this->row,
            'description' => $this->description,
            'is_available' => $this->is_available,
            'feedbacks' => $this->feedbacks,
            'reservations' => $this->reservations
        ];
    }
}
