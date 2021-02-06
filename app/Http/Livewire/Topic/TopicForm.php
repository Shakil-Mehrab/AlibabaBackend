<?php

namespace App\Http\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;
use App\Bag\FSL\Contracts\ManageTopics;

class TopicForm extends Component
{
    public $topic;

    public $state = [];

    public function mount(Topic $topic)
    {
        $this->state = $topic->withoutRelations()->toArray();
    }

    public function store(ManageTopics $manager)
    {
        if ($this->topic) {
            $manager->update(
                $this->topic,
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
        return view('livewire.topic.topic-form');
    }
}