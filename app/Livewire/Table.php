<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class Table extends Component
{

    public $search = '';
    public function render()
    {
        if ($this->search) {
            $books = Book::search($this->search)->get();
        } else {
            $books = Book::all();
        }

        $this->dispatch('ciao');
        return view('livewire.table', compact('books'));
    }
}
