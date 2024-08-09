<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bio',
        'birth_date',
        'photo'
    ];

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
