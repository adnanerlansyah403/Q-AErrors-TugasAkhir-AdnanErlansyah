<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileForm extends Component
{
    use WithFileUploads;

    public $name = "";
    public $username;
    public $email = "";
    public $password;
    public $birthdate = "";
    public $gender = "";
    public $profession = "";
    public $address;
    public $bio = "";
    public $photo;


    protected $rules = [
        'name' => 'required|min:5',
        'username' => 'max:50',
        'email' => 'required|email|max:255',
        'password' => 'nullable|min:6',
        'birthdate' => 'required',
        'gender' => 'required',
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
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->birthdate = Auth::user()->birthdate;
        $this->gender = Auth::user()->gender;
        $this->profession = Auth::user()->profession;
        $this->address = Auth::user()->address;
        $this->bio = Auth::user()->bio;
    }

    // public function updated($property)
    // {
    //     $this->validateOnly($property);
    // }

    public function render()
    {
        return view('livewire.form.profile-form');
    }

    public function saveProfile()
    {
        // dd("test");
        $this->validate();

        $user = Auth::user();

        if (isset($this->photo)) {
            Storage::disk('public')->exists($user->photo_path) ?
                Storage::disk('public')->delete($user->photo_path) : false;
            $photo_originalname = $this->photo->getClientOriginalName();
            $photo_path = '/' . $this->photo->store('photos_user_profile', 'public');
            $photo_link = request()->getSchemeAndHttpHost() . '/' . $photo_path;
        }

        $user->update([
            "name" => $this->name ? $this->name : $user->name,
            "username" => $this->username ?
                Str::replace(' ', '', $this->username) : $user->username,
            "email" => $this->email ? $this->email : $user->email,
            "password" => $this->password ? $this->password : $user->password,
            "birthdate" => $this->birthdate ? $this->birthdate : $user->birthdate,
            "gender" => $this->gender ? $this->gender : $user->gender,
            "profession" => $this->profession ? $this->profession : $user->profession,
            "address" => $this->address ? $this->address : $user->address,
            "bio" => $this->bio ? $this->bio : $user->bio,
            "photo_originalname" => isset($photo_originalname) ? $photo_originalname : null,
            "photo_path" => isset($photo_path) ? $photo_path : null,
            "photo_link" => isset($photo_link) ? $photo_link : null
        ]);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->birthdate = $user->birthdate;
        $this->profession = $user->profession;
        $this->address = $user->address;
        $this->bio = $user->bio;

        session()->flash('success', 'Your profile form has been submitted!');

        // return redirect()->route('users.profile')->with('success', 'Your profile form has been submitted!');
    }
}
