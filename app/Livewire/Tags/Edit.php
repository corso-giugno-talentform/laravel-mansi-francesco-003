<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;

class Edit extends Component
{
    public Tag $tag;
    public $name;
    public function mount()
    {
        $this->name = $this->tag->name;
    }
    public function update()
    {
        $this->tag->update([
            'name' => $this->name,
        ]);

        request()->session()->flash('success', 'ELemento Aggiornato');
    }
    public function render()
    {

        return view('livewire.tags.edit');
    }
}
