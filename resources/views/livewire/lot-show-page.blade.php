<div>

    <section class="bg-white dark:bg-gray-900">
        <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <div class="">
            @if($lot->images()->count())
                @foreach($lot->images()->orderBy('primary', 'desc')->get() as $img)

                    <img class="mb-5 w-full" src="{{ '../' . $img->base64_normal }}" />

                @endforeach
            @else
                <img class="w-full" src="https://placehold.co/600x400?text=No+primary+image" alt="dashboard image">
            @endif
            </div>
            <div class="mt-4 md:mt-0">

                @can('admin')
                    <div class="mb-5">
                        @can('update', $lot)
                            <a wire:navigate href="{{route('admin.lot.edit', ['lot' => $lot->id])}}" class="text-white bg-green-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Edit</a>
                        @endcan
                    </div>
                @endcan

                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{$lot->name}}</h2>

                <p class="mb-6 font-light text-blue-500 md:text-lg dark:text-gray-400">{{ $lot->short_description }}</p>
                <p class="mb-6">{{ $lot->long_description }}</p>

                <!-- Modal body -->
                <form action="#" class="mb-6" wire:submit.prevent="save">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                            <input wire:model="form.firstname" type="text" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First name" required="">
                            @error('form.firstname')
                            <span class="text-red-500  text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input wire:model="form.lastname" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last name" required="">
                            @error('form.lastname')
                            <span class="text-red-500  text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="Phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                            <input wire:model="form.phone" type="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Phone number" required="">
                            @error('form.phone')
                            <span class="text-red-500  text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                            <input wire:model="form.email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="E-mail" required="">
                            @error('form.email')
                            <span class="text-red-500  text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label wire:poll="highestBid" for="bid_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bid amount (Greater than € {{$highestAmount}})</label>
                            <input wire:model="form.amount" type="text" name="bid_amount" id="bid_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                            @error('form.amount')
                            <span class="text-red-500  text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <input wire:model="form.lot_id" value="{{$lot->id}}" type="hidden" name="lot_id" id="lot_id">


                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Place my bid!
                    </button>
                </form>

                <div class="overflow-x-auto">

                    <h2 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Current bids</h2>


                    @if($lot->bids->count())

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Amount</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                </tr>
                            </thead>
                            <tbody wire:poll>
                                @foreach($lot->bids()->orderBy('amount', 'desc')->get(['amount', 'firstname']) as $bid)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-2 py-2">
                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300"> € {{ $bid->amount }}</span>
                                        </td>
                                        <td class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300"> {{ $bid->firstname }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>

                    @else
                        <p>There are no bids yet. You could be the first!</p>
                    @endif
                </div>

            </div>
        </div>
    </section>

</div>
