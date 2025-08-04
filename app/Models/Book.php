<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'year', 'page', 'image', 'author_id'];

    public function author() //singolare
    {
        return $this->belongsTo(Author::class);
    }
}
