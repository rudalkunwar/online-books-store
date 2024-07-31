<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'contact',
        'photo'
    ];
    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
