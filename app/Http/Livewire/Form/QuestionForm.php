<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class QuestionForm extends Component
{

    public $title;
    public $category;
    public $description;

    protected $rules = [
        'title' => 'nullable',
        'category' => 'required|min:1',
        'description' => 'required'
    ];

    protected $messages = [
        'title.required' => 'Title is required',
        'category.required' => 'Category is required',
        'description.required' => 'Description is required',
        'title.min' => 'Title must be at least 6 characters',
        'category.min' => 'Category must be at least 1 character',
        'description.min' => 'Description must be at least 5 characters',
        'title.max' => 'Title cannot be longer than 255 characters',
    ];

    public function render()
    {
        return view('livewire.form.question-form');
    }

    public function storeQuestion()
    {
        dd($this->category, $this->title, $this->description);
        $this->validate();
    }
}
