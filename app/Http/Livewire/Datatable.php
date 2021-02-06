<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Schema;

class Datatable extends Component
{
    use WithPagination;

    public $model;

    public $columns;

    public $exclude;

    public $paginate;

    public $checked = [];

    public $query;

    public function mount($model, $exclude = '', $paginate = 20)
    {
        $this->model = $model;
        $this->exclude = explode(',', $exclude);
        $this->paginate = $paginate;
        $this->columns = $this->columns();
    }

    public function columns()
    {
        return collect(Schema::getColumnListing($this->builder()->getQuery()->from))
            ->reject(function ($column) {
                return in_array($column, $this->exclude);
            })
            ->toArray();
    }

    public function builder()
    {
        return new $this->model;
    }

    protected function checkedRecords()
    {
        return $this->builder()->whereIn('id', $this->checked);
    }

    public function isChecked($record)
    {
        return in_array($record->id, $this->checked);
    }

    public function deleteChecked()
    {
        $this->checkedRecords()->delete();

        $this->checked = [];
    }

    public function records()
    {
        $builder = $this->builder();

        if ($this->query) {
            $builder = $builder->search($this->query);
        }

        return $builder->paginate($this->paginate);
    }

    public function render()
    {
        return view('livewire.datatable');
    }
}
