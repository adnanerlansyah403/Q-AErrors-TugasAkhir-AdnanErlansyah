@extends("main")

@section("title", "My Answer")


@section("content_frontend")

<section class="section">
    <div class="container">
        <p class="text-[18px]"><span class="span font-bold">Jawaban Saya</span></p>

        <div class="flex items-center gap-10">
            <div class="flex items-center gap-6 px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <a href="#new" class="font-bold outline outline-1 outline-red-primary px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                    <span class="span">N</span>ew
                </a>
                <a href="#notanswer" class="font-bold outline outline-1 outline-red-primary px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                    <span class="span">Not</span> Answer
                </a>
            </div>
            <div class="flex-1 flex items-center gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                    <input type="email" name="email" id="email" class="" value="{{ old('email') }}" class="" placeholder="Your email..." >
                </div>

                <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                    Search
                </button>
            </div>
        </div>

        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]">
                <a href="" class="text-md font-bold mb-1">Kenapa Variable INV_A tidak terdefnisi?</a>
                <h3 class="font-semibold text-[16px]">
                    Category: 
                    <span class="span">Coding</span>
                </h3>
                <p class="text-[18px] text-slate-500 mt-6">
                    kenapa variabel inva tidak terdefinisi dalam fungsi affinedecipher, apa yang seharusnya saya lakukan ?
                </p>
                <div class="flex justify-between items-center mt-6">
                    <div>
                        <h3 class="font-bold">Di buat <span class="span">5 Jam Yang Lalu</span></h3>
                        <h3 class="font-bold">Oleh <span class="span">Adnan Erlansyah</span></h3>
                    </div>
                    <p class="flex items-center gap-2">
                        Jawaban 
                        <span class="block w-8 h-8 rounded-full leading-8 bg-red-primary text-white font-semibold text-center">
                            5
                        </span>
                    </p>
                </div>
            </div>
            <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]">
                <a href="" class="text-md font-bold mb-1">Kenapa file .env saya tidak berjalan di server nodejs pada saat mencoba running?</a>
                <h3 class="font-semibold text-[16px]">
                    Category: 
                    <span class="span">Coding</span>
                </h3>
                <p class="text-[18px] text-slate-500 mt-6">
                    kenapa variabel inva tidak terdefinisi dalam fungsi affinedecipher, apa yang seharusnya saya lakukan ?
                </p>
                <div class="flex justify-between items-center mt-6">
                    <div>
                        <h3 class="font-bold">Di buat <span class="span">5 Jam Yang Lalu</span></h3>
                        <h3 class="font-bold">Oleh <span class="span">Adnan Erlansyah</span></h3>
                    </div>
                    <p class="flex items-center gap-2">
                        Jawaban 
                        <span class="block w-8 h-8 rounded-full leading-8 bg-red-primary text-white font-semibold text-center">
                            5
                        </span>
                    </p>
                </div>
            </div>
            <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]">
                <a href="" class="text-md font-bold mb-1">Kenapa file .env saya tidak berjalan di server nodejs pada saat mencoba running?</a>
                <h3 class="font-semibold text-[16px]">
                    Category: 
                    <span class="span">Coding</span>
                </h3>
                <p class="text-[18px] text-slate-500 mt-6">
                    kenapa variabel inva tidak terdefinisi dalam fungsi affinedecipher, apa yang seharusnya saya lakukan ?
                </p>
                <div class="flex justify-between items-center mt-6">
                    <div>
                        <h3 class="font-bold">Di buat <span class="span">5 Jam Yang Lalu</span></h3>
                        <h3 class="font-bold">Oleh <span class="span">Adnan Erlansyah</span></h3>
                    </div>
                    <p class="flex items-center gap-2">
                        Jawaban 
                        <span class="block w-8 h-8 rounded-full leading-8 bg-red-primary text-white font-semibold text-center">
                            5
                        </span>
                    </p>
                </div>
            </div>
            <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]">
                <a href="" class="text-md font-bold mb-1">Kenapa file .env saya tidak berjalan di server nodejs pada saat mencoba running?</a>
                <h3 class="font-semibold text-[16px]">
                    Category: 
                    <span class="span">Coding</span>
                </h3>
                <p class="text-[18px] text-slate-500 mt-6">
                    kenapa variabel inva tidak terdefinisi dalam fungsi affinedecipher, apa yang seharusnya saya lakukan ?
                </p>
                <div class="flex justify-between items-center mt-6">
                    <div>
                        <h3 class="font-bold">Di buat <span class="span">5 Jam Yang Lalu</span></h3>
                        <h3 class="font-bold">Oleh <span class="span">Adnan Erlansyah</span></h3>
                    </div>
                    <p class="flex items-center gap-2">
                        Jawaban 
                        <span class="block w-8 h-8 rounded-full leading-8 bg-red-primary text-white font-semibold text-center">
                            5
                        </span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection