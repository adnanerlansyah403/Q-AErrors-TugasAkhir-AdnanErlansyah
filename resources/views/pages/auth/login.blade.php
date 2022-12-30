@extends("main")

@section("title", "Login")


@section("content_frontend")

<section class="section"
x-data="{
    passwordVisible: false,
    eyeOffIcon: 'eye-off-outline',
    eyeIcon: 'eye-outline',
}">
    <div class="container">

        <h1 class="text-lg text-center mb-10"><span class="span">W</span>elcome</h1>

        <form action="{{ route("auth.login") }}" method="POST" class="max-w-lg mx-auto">
            @csrf

            <div class="mb-10">
                <label for="email" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">E</span>mail</label>
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                    <input type="email" name="email" id="email" class="" value="{{ old('email') }}" class="" placeholder="Your email..." style="width: 100%;">
                </div>
            </div>

            <div class="mb-10">
                <label for="password" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">P</span>assword</label>
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 flex items-center w-full relative">
                    <input x-bind:type="passwordVisible ? 'text' : 'password'" name="password" id="password" class="" value="{{ old('password') }}" class="" placeholder="Your password..." style="width: 90%">
                    <a class="cursor-pointer text-md flex-1 absolute right-4 top-[55%] -translate-y-1/2" x-on:click="passwordVisible = !passwordVisible">
                        <ion-icon x-bind:name="passwordVisible ? eyeOffIcon : eyeIcon"></ion-icon>
                    </a>
                </div>
            </div>

            <div class="flex justify-center items-center">
                <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                    Login
                </button>
            </div>

            <p class="text-[26px] mt-10">
                Don't have an account?, <a href="{{ route("register") }}" class="span">Register Now!</a>
            </p>
        </form>

    </div>
</section>

@endsection