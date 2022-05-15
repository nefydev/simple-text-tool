<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Tool extends Component
{
    public $text;
    public $transformations;
    public $totals;

    protected $rules = [
        'text' => 'sometimes|max:80',
    ];

    public function render()
    {
        $transformations = $this->transformations;
        $totals = $this->transformations;

        return view('livewire.tool', compact(['transformations', 'totals']));
    }

    public function updatedText()
    {
        $this->validate();

        $this->transformations = [
            'upper' => Str::upper($this->text),
            'lower' => Str::lower($this->text),
            'ucfirst' => Str::ucfirst($this->text),
            'reverse' => Str::reverse($this->text),
            'camel' => Str::camel($this->text),
            'snake' => Str::snake($this->text),
            'studly' => Str::studly($this->text),
            'slug' => Str::slug($this->text)
        ];
        $this->totals = [
            'length' => Str::length($this->text),
            'wordCount' => Str::wordCount($this->text)
        ];
    }
}
