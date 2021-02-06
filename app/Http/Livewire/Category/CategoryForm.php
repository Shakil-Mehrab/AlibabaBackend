<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Bag\FSL\Contracts\ManageCategories;
use App\Http\Contracts\UpdatesCategoryInformation;

class CategoryForm extends Component
{
    public $category;

    public $state = [];

    public $parents;

    public $enableSlugInput = false;

    public $oldSlugValue;

    public $slugManuallyChanged = false;

    public $showSlugReset = false;

    public function nameChanged($title)
    {
        if ($this->slugManuallyChanged) {
            return;
        }

        $this->titleToSlug($title);
    }

    protected $listeners = ['clickEditButton'];

    public function clickEditButton()
    {
        if(!$this->state) {
            return;
        }

        if ($this->enableSlugInput) {
            $this->state['slug'] = $this->oldSlugValue;
            $this->enableSlugInput = false;
        } else {
            $this->oldSlugValue = $this->state['slug'];
            $this->enableSlugInput = true;
        }
    }

    public function changeEditInput()
    {
        $this->enableSlugInput = false;
        $this->slugManuallyChanged = true;
    }

    public function resetSlugInput()
    {
        $this->titleToSlug($this->state['name']);
        $this->enableSlugInput = false;
        $this->slugManuallyChanged = false;
    }

    public function mount(Category $category)
    {
        $this->state = $category->withoutRelations()->toArray();
        $this->parents = Category::isLive()->get()->except(optional($this->category)->id)->toFlatTree();
    }

    public function store(ManageCategories $manager)
    {
        if ($this->category) {
            $manager->update(
                $this->category,
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
        return view('livewire.category.category-form');
    }

    protected  function titleToSlug($title)
    {
        $this->state['slug'] = Str::slug($title);
    }
}
