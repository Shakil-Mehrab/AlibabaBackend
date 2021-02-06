<?php

namespace App\Http\Livewire\Product;

use App\Models\Tag;
use App\Models\User;
use App\Models\Topic;
use App\Models\Region;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Bag\FSL\Contracts\ManageArticles;
use App\Models\Product;

class ProductForm extends Component
{
    public $state = [];

    public $article;

    public $categories;

    public $topics;

    public $tags;

    public $showingMediaModal = false;

    public $showingRegionSelectionModal = false;

    public $select2Data;

    public function mount(Product $article)
    {
        // dd(User::find(auth()->user()->id));
        // dd($article->toArray());
        $this->state = $article->load(['categories'])->toArray();
        // $this->categories = Category::get()->toTree();
        // $this->topics = Topic::get();
        // $this->tags = Tag::get();
    }

    public function titleChanged($title)
    {
        $this->titleToSlug($title);
    }

    protected  function titleToSlug($title)
    {
        $this->state['slug'] = Str::slug($title);
    }

    public function updatedSelect2Data($value)
    {
        if (in_array($value, $this->state['tags'])) {
            if (($key = array_search($value, $this->state['tags'])) !== false) {
                unset($this->state['tags'][$key]);
            }

            return;
        }

        $this->state['tags'][$value] = $value;

        // array_push($this->state['tags'], $value);

    }

    public function categories()
    {
        return Category::get()->toTree();
    }

    public function topics()
    {
        return Topic::get();
    }

    public function tags()
    {
        return Tag::get();
    }

    public function regions()
    {
        return Region::get()->toTree();
    }

    public function store(ManageArticles $manager)
    {
        if ($this->article) {
            $manager->update(
                $this->article,
                $this->state
            );
            $this->emit('saved');

            return redirect()->route('article.index');
        }

        $manager->create(
            $this->state
        );

        $this->state = [];

        $this->emit('saved');

        return redirect()->route('article.index');

        // dd($this->state);
        // $article = new Article;

        // // $article->fill($this->state);

        // foreach($this->state as $key => $value )
        // {
        //     $article->$key = $value;
        // }

        // $article->user()->associate(auth()->user());

        // $article->push();

        // $article->save();

        // return $this->state;


        // $article = auth()->user()->articles()->create($this->state);

        // $article->categories()
        //         ->sync(
        //             $this->state['categories']
        //         );

        // $article->topics()
        //         ->sync(
        //             $this->state['topics']
        //         );

        // $article->tags()
        //         ->sync(
        //             $this->state['tags']
        //         );

    }

    public function render()
    {
        return view('livewire.product.product-form');
    }

    protected function filteredArray($request)
    {
        return collect(array_filter($request));
    }
}