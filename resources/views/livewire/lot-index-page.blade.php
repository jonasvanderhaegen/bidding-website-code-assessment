<div>

    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5">

        <div class="mx-auto max-w-screen-xl">

            <div class="bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" wire:model.live.debounce.200ms="search" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 " placeholder="Search" required="">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-col items-center mt-5">
    {{ $this->lots->links()  }}
    </div>

    @foreach($this->lots as $lot)

    <section class="bg-white ">
        <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">

            @if($lot->images()->wherePrimary(true)->count())
                <!-- TODO: replace img url generation, this is not ok -->
                <img class="w-full" src="{{ '../' . $lot->images()->wherePrimary(true)->first()->base64_normal }}" />
            @else
                <img class="w-full" src="https://placehold.co/600x400?text=No+primary+image" alt="dashboard image">
            @endif

            <div class="mt-4 md:mt-0">

                @can('admin')
                    <div class="mb-5">
                        @can('update', $lot)
                        <a wire:navigate href="{{route('admin.lot.edit', ['lot' => $lot->id])}}" class="text-white bg-green-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Edit</a>
                        @endcan
                    </div>
                @endcan

                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 "><a wire:navigate href="{{ route('lot.show', ['lot' => $lot->id])  }}">{{ $lot->name }}</a></h2>

                <a wire:navigate href="{{route('lot.show', ['lot' => $lot->id])}}"
                   class="inline-flex items-center border-black text-black bg-transparent font-medium rounded-lg text-sm pb-5 text-center">
                    Inspect lot
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>



                <p class="font-light text-blue-500 md:text-lg">Bidding period: {{Carbon\Carbon::parse($lot->datetime_start)->format('l jS \of F Y h:i:s A') }}
                    <br> until
                    {{Carbon\Carbon::parse($lot->datetime_end)->format('l jS \of F Y h:i:s A') }}
                </p>
                <p class="font-light text-blue-500 md:text-lg">Minimum bid amount: € {{$lot->min_bid_amount}}</p>
                <p class="mb-1 font-light text-blue-500 md:text-lg">Estimated value: € {{$lot->total_estimated_value}}</p>

                <p class="mb-6 font-light text-gray-500 md:text-lg">{{ $lot->short_description }}</p>


            </div>
        </div>
    </section>

    <hr class="mb-4">

    @endforeach

    <div class="flex flex-col items-center">
        {{ $this->lots->links()  }}
    </div>

    {{-- Stop trying to control. --}}
</div>
