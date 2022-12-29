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

    public function __construct()
    {
        $this->middleware = ['throttle:5,1'];
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
        try {
            $this->rateLimit(3, 60);
            // dd($this->exception);
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

        return redirect()->route('reviews.create')->with('success', 'Your review has been submitted!');
    }
}
