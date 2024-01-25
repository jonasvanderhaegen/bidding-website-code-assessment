<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Create a new lot</h2>
        <form action="#" method="POST" wire:submit.prevent="save">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input wire:model="form.name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type name" required="">
                    @error('form.name')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="min_bid_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minimum bidding amount</label>
                    <input wire:model="form.min_bid_amount" type="text" name="min_bid_amount" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700" placeholder="$2999" required="">
                    @error('form.min_bid_amount')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="w-full">
                    <label for="min_bid_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">total estimated value</label>
                    <input wire:model="form.total_estimated_value" type="text" name="min_bid_amount" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                    @error('form.total_estimated_value')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
                    <input wire:model="form.priority" type="number" name="item-weight" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="12" required="">
                    @error('form.priority')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidding must start from</label>
                    <input wire:model="form.datetime_start" type="datetime-local" name="" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                    @error('form.datetime_start')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidding must stop after</label>
                    <input wire:model="form.datetime_end" type="datetime-local" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                    @error('form.datetime_end')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select wire:model="form.status" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value=""></option>
                        <option value="true">Enabled</option>
                        <option value="false">Disabled</option>
                    </select>
                    @error('form.status')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                    <select wire:model="form.state_id" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta description</label>
                    <textarea wire:model="form.meta_description" id="meta_description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Your description here"></textarea>
                    @error('form.meta_description')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="short_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">short description</label>
                    <textarea wire:model="form.short_description" id="short_description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Your description here"></textarea>
                    @error('form.short_description')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="long_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">long Description</label>
                    <textarea wire:model="form.long_description"  id="long_description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Your description here"></textarea>
                    @error('form.long_description')
                    <span class="text-red-500  text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add lot
            </button>
        </form>
    </div>
</section>
