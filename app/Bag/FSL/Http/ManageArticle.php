<?php

namespace App\Bag\FSL\Http;

use App\Bag\FSL\Contracts\ManageArticles;
use Illuminate\Support\Facades\Validator;

class ManageArticle implements ManageArticles
{
    /**
     * create
     *
     * @param  mixed $input
     * @return void
     */
    public function create(array $input)
    {
        $input = $this->deepFilter($input);
        // dd(collect($input));
        // dd($this->deepFilter($input));
        Validator::make($input, [
            'kicker' => ['nullable', 'string', 'max:200'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:articles,slug'],
            'body' => ['required'],
            // 'thumbnail' => ['required'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'exists:categories,id'],
            'topics' => ['nullable', 'array'],
            'tags' => ['nullable', 'array'],
        ])->validate();
        // dd($input);

        $article = auth()->user()->articles()->create([
            'kicker' => optional($input)['kicker'],
            'title' => $input['title'],
            'slug' => $input['slug'],
            'body' => optional($input)['body'],
        ]);

        $article->categories()
            ->sync(
                optional($input)['categories']
            );

        $article->topics()
            ->sync(
                optional($input)['topics']
            );

        $article->tags()
            ->sync(
                optional($input)['tags']
            );
    }

    /**
     * update
     *
     * @param  mixed $article
     * @param  mixed $input
     * @return void
     */
    public function update($article, array $input)
    {
        dd($input['categories']);
        $input = $this->deepFilter($input);

        Validator::make($input, [
            'kicker' => ['nullable', 'string', 'max:200'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:articles,slug,' . $article->id],
            'body' => ['required'],
            // 'thumbnail' => ['required'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'exists:categories,id'],
            'topics' => ['nullable', 'array'],
            'tags' => ['nullable', 'array'],
        ])->validate();

        $article->forceFill([
            'kicker' => optional($input)['kicker'],
            'title' => $input['title'],
            'slug' => $input['slug'],
            'body' => optional($input)['body'],
        ])->save();

        $article->categories()
            ->sync(
                $input['categories']
            );

        $article->topics()
            ->sync(
                $input['topics']
            );

        $article->tags()
            ->sync(
                $input['tags']
            );
    }

    /**
     * delete
     *
     * @param  mixed $article
     * @return void
     */
    public function delete($article)
    {

    }

    /**
     * deepFilter
     *
     * @param  mixed $array
     * @return void
     */
    protected function deepFilter(array $array)
    {
        if (empty($array)) {
            return [];
        }

        $filteredArray = [];
        foreach ($array as $key => $value) {
            if (is_array($value) && !empty($value)) {
                $value = $this->deepFilter($value);
            }
            if (!empty($value)) {
                $filteredArray[$key] = $value;
            }
        }

        return $filteredArray;
    }
}