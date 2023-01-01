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
        'refresh' => '$refresh',
        'refreshList' => 'refreshList'
    ];

    public function render()
    {
        return view('livewire.admin.list.todolist');
    }

    public function refreshList()
    {
        $this->todolists = ModelsTodolist::query()->get();
    }

    public function resetModalTodolist($modalName)
    {
    }

    public function deleteTodolist(ModelsTodolist $todolist)
    {

        $todolist->delete();

        return redirect()->route("admin.dashboard")->with("success", "Todolist deleted successfully");
    }

    public function editTodolist(ModelsTodolist $todolist)
    {
        $this->emit("editTodolist", $todolist);
    }
}
