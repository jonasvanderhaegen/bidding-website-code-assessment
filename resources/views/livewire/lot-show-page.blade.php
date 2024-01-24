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
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{$lot->name}}</h2>

                <!-- Modal toggle -->
                <div class="flex justify-start mb-5">
                    <button id="readProductButton" data-modal-target="readProductModal" data-modal-toggle="readProductModal" class="block text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-left" type="button">
                        Show longer description
                    </button>
                </div>

                <p class="mb-6 font-light text-blue-500 md:text-lg dark:text-gray-400">{{ $lot->short_description }}</p>


                <div class="overflow-x-auto">

                    <h2 class="mb-4 text-xl tracking-tight font-extrabold text-gray-900 dark:text-white">Current bids</h2>

                    <!-- Modal toggle -->
                    <div class="flex justify-start mb-5">
                        <button id="readProductButton" data-modal-target="readProductModal" data-modal-toggle="readProductModal" class="block text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-left" type="button">
                            I want to place a bid as guest
                        </button>
                    </div>

                    @if($lot->bids->count())

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Amount</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                </tr>
                            </thead>
                            <tbody>
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

                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- Main modal -->
    <div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-end mb-4 rounded-t sm:mb-5">

                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Long description</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $lot->long_description }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
