<?php

namespace App\Http\Livewire\Admin\Form;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class KategoriForm extends Component
{

    public $name;
    public $slug;
    public $description;
    public $saveCategory;
    public $category;


    public function rules()
    {

        // $category = Category::query()->where('id', $this->category->id)->first();

        return [
            'name' => 'required|unique:categories,name',
            'description' => 'nullable',
        ];
    }

    protected $messages = [
        'name.required' => 'Name is required',
        'name.unique' => 'Name already exists',
        'name.min' => 'Name must be at least 4 characters',
        'description.max' => 'Description must be no more than 255 characters',
    ];

    public function mount()
    {
        if (!empty(request()->category)) {
            $this->saveCategory = "updateCategory";
            $this->name = request()->category->name;
            $this->description = request()->category->description;
            $this->category = request()->category;
            return;
        } else {
            $this->saveCategory = "storeCategory";
            return;
        }
    }

    public function updating()
    {
        if (!empty(request()->category)) {
            $this->saveCategory = "updateCategory";
            $this->name = request()->category->name;
            $this->description = request()->category->description;
            $this->category = request()->category;
            return;
        } else {
            $this->saveCategory = "storeCategory";
            return;
        }
    }


    public function render()
    {
        return view('livewire.admin.form.kategori-form');
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'unique:categories,name,' . $this->category->id,
            'description' => 'nullable',
        ]);

        if ($this->category->name == $this->name) {
            $this->category->update([
                'description' => $this->description
            ]);
        } else {
            $this->category->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description
            ]);
        }

        session()->flash('success', 'Kategori berhasil di update!');
    }

    public function storeCategory()
    {
        $this->validate();

        $category = Category::query()->create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description
        ]);

        $this->reset();

        session()->flash('success', 'Kategori berhasil disimpan!');
    }
}
