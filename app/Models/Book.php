<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'book_image',
        'description',
        'publisher_id'
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }
}
