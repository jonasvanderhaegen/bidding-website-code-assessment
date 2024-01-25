<section class="bg-gray-50 ">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search for lots</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.live.debounce="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a wire:navigate href="{{route('admin.lot.create')}}" class="flex items-center justify-center text-white bg-green-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Lot
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">name</th>
                        <th scope="col" class="px-4 py-3">datetime_start</th>
                        <th scope="col" class="px-4 py-3">datetime_end</th>
                        <th scope="col" class="px-4 py-3">min_bid_amount</th>
                        <th scope="col" class="px-4 py-3">priority</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($this->lots as $lot)
                    <tr class="border-b dark:border-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$lot->name}}</th>
                        <td class="px-4 py-3">{{$lot->datetime_start}}</td>
                        <td class="px-4 py-3">{{$lot->datetime_end}}</td>
                        <td class="px-4 py-3">{{$lot->min_bid_amount}}</td>
                        <td class="px-4 py-3">{{$lot->priority}}</td>
                        <td class="px-4 py-3 flex items-center justify-end">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                <li>
                                    <a wire:navigate href="{{route('admin.lot.edit', ['lot' => $lot->id])}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <button wire:click="delete({{ $lot }})" wire:confirm="Are you sure you want to delete this lot?" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                {{ $this->lots->links() }}
            </nav>
        </div>
    </div>
</section>
