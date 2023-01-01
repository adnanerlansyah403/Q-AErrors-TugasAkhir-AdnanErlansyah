<?php

namespace App\Http\Livewire\Group;

use Livewire\Component;

class CommentQuestion extends Component
{

    public $question;
    public $comment;
    public $countComments = 0;

    protected $rules = [
        'comment' => 'required',
    ];

    protected $messages = [
        'comment.required' => 'Comment is required',
    ];

    public function mount()
    {
        $this->countComments = !empty($this->question->comments) ? count($this->question->comments) : 0;
    }

    public function render()
    {
        return view('livewire.group.comment-question');
    }

    public function storeComment()
    {
        $this->validate();

        $question = $this->question->comments()->create([
            'message' => $this->comment,
            'user_id' => auth()->id(),
            'question_id' => $this->question->id,
        ]);

        $this->countComments += 1;

        $this->reset(['comment']);

        session()->flash('scs', 'Your comment has been added');


        // return redirect()->route('errors.searcherror.index')->with('success', 'Your comment has been added');
    }
}
