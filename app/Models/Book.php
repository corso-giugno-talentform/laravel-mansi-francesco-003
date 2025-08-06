<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['name', 'year', 'page', 'image', 'author_id', 'description'];
    public $asYouType = true;
    public function author() // singolare
    {
        return $this->belongsTo(Author::class);
    }

    public function categories() // plurale
    {
        return $this->belongsToMany(Category::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
