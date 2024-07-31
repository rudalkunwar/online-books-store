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
        'publication_id',
        'photo',
        'price',
        'published_date'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category')->withTimestamps();
    }
}
