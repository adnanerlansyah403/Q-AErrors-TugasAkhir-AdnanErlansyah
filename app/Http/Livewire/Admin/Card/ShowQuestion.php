<?php

namespace App\Http\Livewire\Admin\Card;

use Livewire\Component;

class ShowQuestion extends Component
{

    public $question;
    public $likeStatus = false;
    public $countLikes = 0;

    protected $listeners = [
        'like' => '$refresh',
    ];

    public function mount()
    {
        $this->countLikes = !empty($this->question->likes) ? count($this->question->likes) : 0;
    }

    public function render()
    {
        return view('livewire.admin.card.show-question');
    }

    public function like()
    {

        $likeUser = $this->question->likes->where('user_id', auth()->id())->first();

        if ($likeUser == null) {
            // dd($likeUser);
            $question = $this->question->likes()->create([
                'user_id' => auth()->id(),
                'question_id' => $this->question->id,
            ]);

            session()->flash('successLike', 'Your like has been added');

            $this->countLikes += 1;

            $this->likeStatus = true;


            return;

            // return redirect()->back()->with('success', 'Your like has been added');
        }

        $question = $this->question->likes()->where('user_id', auth()->id())->delete();

        // session()->flash('successLike', 'Your like has been removed');

        $this->countLikes -= 1;

        $this->likeStatus = false;

        return redirect()->route('errors.searcherror.show', $this->question)->with('successLike', 'Your like has been removed');

        // return redirect()->back()->with('success', 'Your like has been removed');

    }
}
