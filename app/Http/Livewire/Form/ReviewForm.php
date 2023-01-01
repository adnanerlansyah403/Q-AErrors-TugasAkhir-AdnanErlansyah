<?php

namespace App\Http\Livewire\Form;

use App\Models\Review;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Illuminate\Validation\ValidationException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class ReviewForm extends Component
{
    use WithRateLimiting;

    public $comment = "";
    public $rating;
    public $exception;

    public $review;

    public $methodForm = "create";

    protected $rules = [
        'comment' => 'required|min:6|max:255',
        'rating' => 'required|max:5',
    ];

    protected $messages = [
        'comment.required' => 'Comment is required',
        'comment.min' => 'Comment must be at least 6 characters',
        'comment.max' => 'Comment must be at most 255 characters',
        'rating.required' => 'Rating is required',
        'rating.max' => 'Rating must be less than 5',
    ];

    public function mount()
    {
        if (request()->review) {
            $this->comment = request()->review->message;
            $this->rating = request()->review->rating;
            $this->review = request()->review;
            $this->methodForm = "update";
        }
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.form.review-form');
    }

    public function storeReview()
    {
        dd("test create");
        try {
            $this->rateLimit(3, 60);
        } catch (TooManyRequestsException $exception) {
            $this->exception = $exception->secondsUntilAvailable;
        }



        $validatedData = $this->validate();

        $review = Review::create([
            "message" => $validatedData['comment'],
            "rating" => $validatedData['rating'],
            "user_id" => auth()->id(),
        ]);

        $this->reset(['comment', 'rating']);

        return redirect()->route('home')->with('success', 'Your review has been submitted!');
    }

    public function updateReview()
    {
        $this->validate();

        $this->review->update([
            'message' => $this->comment,
            'rating' => $this->rating,
        ]);

        session()->flash('successReview', 'Your review has been updated!');
    }
}
