@extends("main")

@section("title", "Create a Reviews")

@section("content_frontend")

<section class="section">
    <div class="container">

        <p class="text-[18px]"><span class="span font-bold">Review </span> / Create</p>
                

        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            <form action="#" class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full">
                @csrf

                <div class="">

                    <div class="w-full">
                        <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">K</span>omentar</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                            <textarea name="address" id="address" rows="10"></textarea>
                        </div>
                    </div>


                    <div class="mt-10 mb-10 w-[48%]">
                        <label for="title" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">R</span>ating</label>
                        <div class="flex items-center gap-2 relative -left-">
                            <div class="rating">
                                <input type='radio' hidden name='rate' id='rating-opt5' data-idx='0'>	
                                <label for='rating-opt5'><span>Amazing</span></label>
                           
                                <input type='radio' hidden name='rate' id='rating-opt4' data-idx='1'>
                                <label for='rating-opt4'><span>Very Good</span></label>
                           
                                <input type='radio' hidden name='rate' id='rating-opt3' data-idx='2'>
                                <label for='rating-opt3'><span>Good</label>
                           
                                <input type='radio' hidden name='rate' id='rating-opt2' data-idx='3'>
                                <label for='rating-opt2'><span>Not Bad</span></label>
                           
                                <input type='radio' hidden name='rate' id='rating-opt1' data-idx='4'>
                                <label for='rating-opt1'><span>So Bad</span></label>
                              </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <button type="submit" href="#notanswer" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                            <span class="span">Kirim</span> 
                            <ion-icon name="send-outline"></ion-icon>
                        </button>
                    </div>

                </div>


            </form>
        </div>
    </div>
</section>

@endsection