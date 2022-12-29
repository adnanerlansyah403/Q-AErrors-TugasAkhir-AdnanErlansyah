<?php

namespace App\Http\Livewire\Form;

use App\Models\Contact;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Illuminate\Validation\ValidationException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class ContactForm extends Component
{
    use WithRateLimiting;

    public $message = "";
    public $name = "";
    public $exception = null;

    protected $rules = [
        'message' => 'required|min:6|max:255',
        'name' => 'required|max:5',
    ];

    protected $messages = [
        'message.required' => 'Message is required',
        'message.min' => 'Message must be at least 6 characters',
        'message.max' => 'Message must be at most 255 characters',
        'name.required' => 'Name is required',
        'name.max' => 'Name must be less than 5',
    ];

    public function render()
    {
        return view('livewire.form.contact-form');
    }

    public function storeContact()
    {
        try {
            $this->rateLimit(3, 60);
        } catch (TooManyRequestsException $exception) {
            $this->exception = $exception->secondsUntilAvailable;
        }



        $validatedData = $this->validate();

        $review = Contact::create([
            "message" => $validatedData['message'],
            "name" => $validatedData['name'],
        ]);

        $this->reset(['message', 'name']);

        return redirect()->route('reviews.create')->with('success', 'Your message has been submitted!');
    }
}
