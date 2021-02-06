<?php

namespace App\Http\Livewire\File;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Bag\FSL\Http\ManageMedia;
use App\Bag\FSL\Contracts\ManageMedias;

class MediaBrowser extends Component
{
    use WithFileUploads, WithPagination;

    public $paginate;

    public $upload;

    public $showingUploadForm = false;

    public $selectedMediaObject;

    public $selectedMediaObjectState = [];

    public $state = [
        'caption' => null,
        'description' => null
    ];

    protected $listeners = ['selectingMedia'];

    public function selectingMedia($media)
    {
        $this->selectedMediaObject = Media::findOrFail($media);

        $this->selectedMediaObjectState = [
            'caption' => $this->selectedMediaObject->caption,
            'description' => $this->selectedMediaObject->description
        ];
    }

    public function updateMediaObject(ManageMedias $manager)
    {
        // TODO::Slug will be added

        $manager->update(
            $this->selectedMediaObject,
            $this->selectedMediaObjectState
        );

        $this->emit('saved');
    }

    public function mount($paginate = 24)
    {
        $this->paginate = $paginate;
    }

    public function medias()
    {
        return Media::latest()->paginate($this->paginate);
    }

    public function updatedStateUpload()
    {
        $manager = new ManageMedia;

        $manager->create(
            $this->state
        );

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.file.media-browser');
    }
}
