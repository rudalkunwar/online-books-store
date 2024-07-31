<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'author_id',
        'author_id',
        'photo',
        'price',
        'published_date'
    ];

    public function authors()
    {
        return $this->belongsTo(Author::class);
    }
    public function publications()
    {
        return $this->belongsTo(Publication::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }
}
