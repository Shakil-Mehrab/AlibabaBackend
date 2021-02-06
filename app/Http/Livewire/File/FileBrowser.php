<?php

namespace App\Http\Livewire\File;

use App\Models\Obj;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileBrowser extends Component
{
    use WithFileUploads;

    public $query;

    public $upload;

    public $object;

    public $ancestors;

    public $creatingNewFolder = false;

    public $state = [
        'name' => ''
    ];

    public $renamingObject = [
        'name' => ''
    ];

    public $renamingObjectState;

    public $showingFileUploadForm = false;

    public $confirmingObjectDeletion;

    public function getResultsProperty()
    {
        if (strlen($this->query)) {
            return Obj::search($this->query)->get();
        }

        return $this->object->children;
    }

    public function deleteObject()
    {
        Obj::find($this->confirmingObjectDeletion)->delete();

        $this->confirmingObjectDeletion = null;

        $this->object = $this->object->fresh();
    }

    public function updatedUpload($upload)
    {
        $object = auth()->user()->objects()->make(['parent_id' => $this->object->id]);
        $object->objectable()->associate(
            auth()->user()->files()->create([
                'name' => $upload->getClientOriginalName(),
                'size' => $upload->getSize(),
                'path' => $upload->storePublicly(
                    'files', [
                        'disk' => 'public'
                    ]
                )
            ])
        );

        $object->save();

        $this->object = $this->object->fresh();
    }

    public function updatingRenamingObject($id)
    {
        if ($id == null) {
            $this->renamingObjectState['name'] = '';
        }

        if ($object = Obj::find($id)) {
            $this->renamingObjectState = [
                'name' => $object->objectable->name
            ];
        }
    }

    public function renameObject()
    {
        $this->validate([
            'renamingObjectState.name' => 'string|required|max:255'
        ]);

        Obj::find($this->renamingObject)->objectable->update($this->renamingObjectState);

        $this->renamingObject = null;
        $this->renamingObjectState['name'] = '';
        $this->object = $this->object->fresh();
    }

    public function createFolder()
    {
        $this->validate([
            'state.name' => 'string|required|max:255'
        ]);
        $object = auth()->user()->objects()->make(['parent_id' => $this->object->id]);
        $object->objectable()->associate(
            auth()->user()->folders()->create($this->state)
        );

        $object->save();

        $this->creatingNewFolder = false;
        $this->state['name'] = '';
        $this->object = $this->object->fresh();
    }

    public function render()
    {
        return view('livewire.file.file-browser');
    }

    protected $messages = [
        'state.name.string' => 'The Name must be string value.',
        'state.name.required' => 'The Name cannot be empty.',
        'renamingObjectState.name.string' => 'The Name must be string value.',
        'renamingObjectState.name.required' => 'The Name cannot be empty.',
    ];
}
