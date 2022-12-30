<?php

namespace App\Http\Livewire\Group;

use Livewire\Component;

class CommentQuestion extends Component
{

    public $question;
    public $comment;

    protected $rules = [
        'comment' => 'required',
    ];

    protected $messages = [
        'comment.required' => 'Comment is required',
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.group.comment-question');
    }

    public function storeComment()
    {
        $this->validate();

        $this->question->comments()->create([
            'message' => $this->comment,
            'user_id' => auth()->id(),
            'question_id' => $this->question->id,
        ]);

        $this->reset();

        session()->flash('success', 'Comment has been added');


        return redirect()->route('errors.searcherror.index')->with('success', 'Your comment has been added');
    }
}
