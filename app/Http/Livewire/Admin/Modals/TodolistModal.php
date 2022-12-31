<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Todolist;
use Livewire\Component;

class TodolistModal extends Component
{

    public $modalName;
    public $user;

    public $task;
    public $description;

    public $todolist;

    protected $rules = [
        'task' => 'required',
        'description' => 'nullable|max:255',
    ];

    protected $messages = [
        'task.required' => 'Task is required',
        'description.required' => 'Description is required',
        'description.max' => 'Description must be less than 255 characters',
    ];

    protected $listeners = [
        'editTodolist' => 'editTodolist',
        'resetModalTodolist' => 'resetModalTodolist',
        'refresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.admin.modals.todolist-modal');
    }

    // public function resetModalTodolist($modalName)
    // {
    //     $this->modalName = $modalName;
    //     $this->task = null;
    //     $this->description = null;
    // }

    public function submit()
    {

        $this->validate();

        $todolist = Todolist::query()->create([
            "task" => $this->task,
            "description" => $this->description,
            "type" => $this->user
        ]);

        $this->reset(['task', 'description']);

        session()->flash("successModal$this->user", "Todolist form has been submitted");
    }

    public function editTodolist($todolist)
    {
        if ($todolist['type'] == 'superadmin') {
            $this->modalName = 'modalTaskSuperAdmin';
        } else if ($todolist['type'] == 'admin') {
            $this->modalName = 'modalTaskAdmin';
        } else {
            $this->modalName = 'modalTaskUser';
        }
        $this->todolist = $todolist;
        $this->task = $todolist['task'];
        $this->description = $todolist['description'];
        $this->user = $todolist['type'];
    }

    public function updateTodolist()
    {
        dd($this->todolist);
    }
}
