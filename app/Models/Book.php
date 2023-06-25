<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'author_id',
        'genre_id',
        'rack',
        'shelf',
        'row',
        'count',
        'description',
        'is_available'
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getUrlAddress()
    {
        return asset('public/storage/' . $this->image);
    }
}
