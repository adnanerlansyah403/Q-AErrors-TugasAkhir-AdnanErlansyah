<?php

namespace App\Http\Livewire\Admin\Card;

use Livewire\Component;

class ShowAnswer extends Component
{
    public $answer;
    public $likeStatus = false;
    public $countLikes = 0;

    protected $listeners = [
        'like' => '$refresh',
    ];

    public function mount()
    {
        // dd(!empty($this->answer->likes) ? true : false);
        $this->countLikes = !empty($this->answer->likes) ? count($this->answer->likes) : 0;
    }

    public function render()
    {
        return view('livewire.admin.card.show-answer');
    }

    public function like()
    {

        $likeUser = $this->answer->likes->where('user_id', auth()->id())->first();

        if ($likeUser == null) {
            $answer = $this->answer->likes()->create([
                'user_id' => auth()->id(),
                'answer_id' => $this->answer->id,
            ]);

            session()->flash('successLikeAnswer', 'Your like has been added');

            $this->countLikes += 1;

            $this->likeStatus = true;


            return;

            // return redirect()->back()->with('success', 'Your like has been added');
        }

        $answer = $this->answer->likes()->where('user_id', auth()->id())->delete();

        // session()->flash('successLike', 'Your like has been removed');

        $this->countLikes -= 1;

        $this->likeStatus = false;

        return redirect()->route('errors.fixerror.show', $this->answer)->with('successLikeAnswer', 'Your like has been removed');

        // return redirect()->back()->with('success', 'Your like has been removed');

    }
}
