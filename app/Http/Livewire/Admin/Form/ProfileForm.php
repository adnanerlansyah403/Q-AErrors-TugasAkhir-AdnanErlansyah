<?php

namespace App\Http\Livewire\Admin\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProfileForm extends Component
{
    public $name = "";
    public $username;
    public $email = "";
    public $password;
    public $birthdate = "";
    public $gender;
    public $profession = "";
    public $address;
    public $bio = "";
    public $photo;


    protected $rules = [
        'name' => 'required|min:5',
        'username' => 'required|max:50',
        'email' => 'required|email|max:255',
        'password' => 'required|min:6',
        'birthdate' => 'required',
        'gender' => 'nullable',
        'profession' => 'nullable',
        'address' => 'required',
        'bio' => 'max:255',
        'photo' => '|nullable|file|image|max:1024'
    ];

    protected $messages = [
        'name.required' => 'Name is required',
        'name.min' => 'Name must be at least 5 characters',
        'username.required' => 'Username is required',
        'email.required' => 'Email is required',
        'email.email' => 'Email is not valid',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters',
        'birthdate.required' => 'Birthdate is required',
        'birthdate.date' => 'Birthdate must be a valid date',
        'gender.required' => 'Gender is required',
        'profession.required' => 'Profession is required',
        'address.required' => 'Address is required',
        'bio.max' => 'Bio is must be less than 255 characters',
    ];

    public function mount()
    {
        $this->gender = 'l';
    }

    public function render()
    {
        return view('livewire.admin.form.profile-form');
    }

    public function saveProfile()
    {

        $this->validate();

        if (isset($this->photo)) {
            $photo_originalname = $this->photo->getClientOriginalName();
            $photo_path = '/' . $this->photo->store('photos_user_profile', 'public');
            $photo_link = request()->getSchemeAndHttpHost() . '/' . $photo_path;
        }

        User::query()->create([
            "name" => $this->name,
            "username" => $this->username,
            "email" => $this->email,
            "password" => $this->password,
            "birthdate" => $this->birthdate,
            "gender" => $this->gender,
            "profession" => $this->profession,
            "address" => $this->address,
            "bio" => $this->bio,
            "photo_originalname" => isset($photo_originalname) ? $photo_originalname : null,
            "photo_path" => isset($photo_path) ? $photo_path : null,
            "photo_link" => isset($photo_link) ? $photo_link : null,
            "role_id" => 2
        ]);

        $this->reset();

        session()->flash('success', 'Admin form has been submitted!');

        // return redirect()->route('users.profile')->with('success', 'Your profile form has been submitted!');
    }
}
