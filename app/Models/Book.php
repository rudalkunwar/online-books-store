<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'publication_id',
        'category_id',
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres')->withTimestamps();
    }
}
