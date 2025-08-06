<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['firstname', 'lastname'];

    public function books() // plurale
    {
        return $this->hasMany(Book::class);
    }
}
