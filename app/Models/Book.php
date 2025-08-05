<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'year', 'page', 'image', 'author_id'];

    public function author() //singolare
    {
        return $this->belongsTo(Author::class);
    }

    public function categories() //plurale
    {
        return $this->belongsToMany(Category::class);
    }
}
