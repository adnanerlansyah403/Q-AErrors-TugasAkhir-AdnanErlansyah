<div class="alert {{ $status }} {{ $type }}" x-ref="alert"> 
    {{-- @dd($message) --}}
    <a id="dismiss" class="cursor-pointer font-semibold text-white">
        Dismiss
    </a>
    @if ($type == "alert-danger")
        <div class="flex items-center justify-between text-white mt-4">
            <div class="title flex items-center gap-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="currentColor"/>
                </svg>
                There were {{ count($message) }} errors with your submission
            </div>
        </div>
        <ul class="list-disc px-8 mt-2">
            @foreach ($message as $m)
                <li class="text-white">
                    <p>{{ is_array($m) ? $m['error'] : $m; }}</p>
                </li>
            @endforeach
        </ul>
    @elseif ($type == 'alert-success' || $type == 'alert-warning')    
        <div class="flex items-center justify-between text-white mt-4">
            <div class="title flex items-center gap-2">
                {!! isset($icon) ? $icon : '' !!}
                Successfully
            </div>
        </div>
        <p class="mt-2 text-xs text-white">
            {{ $message }}
        </p>
    @endif


    <script type="text/javascript">

        let alert = document.querySelector(".alert");
        let dismiss = document.getElementById("dismiss");

        dismiss.addEventListener("click", function(event) {
            alert.classList.remove("active");
        })
        
        window.addEventListener("scroll", function (event) {
            let positionY = window.pageYOffset
            if(positionY < 150) {
                console.log(alert)
                alert.style.position = "absolute";
                alert.style.top = "128px";
            } else {
                alert.style.position = "fixed";
                alert.style.top = "28px";
            }
        })

    </script>
</div>