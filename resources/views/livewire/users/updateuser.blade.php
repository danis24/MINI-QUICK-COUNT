<div>
    <livewire:navbar>
        <div class="container mx-auto mt-10 p-8">
            <form class="max-w-lg mx-auto" wire:submit.prevent="update">
                <div>
                    @if (session()->has('error'))
                        <div class="text-red-500 text-xs">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="form.name"/>
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap</label>
                    @error('form.name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="form.email"/>
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                    @error('form.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer mb-5" wire:model="form.village_id">
                        <option selected>Pilih Desa</option>
                        @if($villages->count() > 0)
                        @foreach($villages as $key => $value)
                        @if($form['name'] == $value->id)
                        <option value="{{$value->id}}" selected>{{$value->nama_desa}}</option>
                        @else
                        <option value="{{$value->id}}">{{$value->nama_desa}}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                    @error('form.village_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
            </form>
        </div>
</div>