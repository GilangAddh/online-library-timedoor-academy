<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book";
    protected $fillable = ['isbn', 'title', 'author', 'publisher', 'id_category', 'language', 'pages', 'publish_date', 'subjects', 'desc', 'image_path'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
