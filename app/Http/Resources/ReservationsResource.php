<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bookname' => $this->book->name,
            'bookimage' => $this->book->image,
            'bookrack' => $this->book->rack,
            'bookshelf' => $this->book->shelf,
            'bookrow' => $this->book->row,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'received_time' => $this->received_time,
            'username' => $this->user->login,
            'userphone' => $this->user->phone
        ];
    }
}
