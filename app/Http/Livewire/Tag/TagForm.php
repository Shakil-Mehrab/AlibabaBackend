<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;
use App\Bag\FSL\Contracts\ManageTags;

class TagForm extends Component
{
    public $tag;

    public $state = [];

    public function mount(Tag $tag)
    {
        $this->state = $tag->withoutRelations()->toArray();
    }

    public function store(ManageTags $manager)
    {
        if ($this->tag) {
            $manager->update(
                $this->tag,
                $this->state
            );
            $this->emit('saved');

            return;
        }

        $manager->create(
            $this->state
        );
        $this->state = [];

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.tag.tag-form');
    }
}
