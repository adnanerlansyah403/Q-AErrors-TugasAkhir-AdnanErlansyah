<?php

namespace App\Http\Livewire\Admin\List;

use App\Models\Todolist as ModelsTodolist;
use Livewire\Component;

class Todolist extends Component
{

    public $i;
    public $todolists;
    public $types;

    protected $listeners = [
        'refreshList' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.admin.list.todolist');
    }

    public function resetModalTodolist($modalName)
    {
        dd("test");
        // $this->emit('resetModalTodolist', [
        //     'modalName' => $modalName,
        // ]);
    }

    public function deleteTodolist(ModelsTodolist $todolist)
    {

        $todolist->delete();

        // session()->flash("successTodolist", "Todolist deleted successfully");

        return redirect()->route("admin.dashboard")->with("success", "Todolist deleted successfully");

        // $this->emit("refreshList");
    }

    public function editTodolist(ModelsTodolist $todolist)
    {
        $this->emit("editTodolist", $todolist);
    }
}
