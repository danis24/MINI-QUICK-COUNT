<div>
    <livewire:navbar>
        <div class="py-20 container mx-auto mt-10 px-10">
            @if(auth()->check())
            @if(auth()->user()->roles[0]->name == 'user')
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white" wire:navigate>
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            {{auth()->user()->name}} - [ {{auth()->user()->village['nama_desa']}} ]
                        </a>
                    </li>
                </ol>
            </nav>

            <div class="py-4">
                <livewire:input-form>
            </div>
            @else
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3 2xl:grid-cols-3">
                <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Jumlah Suara Masuk
                        </h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white" wire:poll.5s>{{ number_format( $jumlah_suara_masuk , 0 , '.' , ',' ); }}</span>
                    </div>
                </div>
                <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Jumlah Suara Sah
                        </h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white" wire:poll.5s>{{ number_format( $jumlah_suara_sah , 0 , '.' , ',' ); }}</span>
                    </div>
                </div>
                <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Jumlah Suara Tidak Sah
                        </h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white" wire:poll.5s>{{number_format( $jumlah_suara_tidak_sah , 0 , '.' , ',' );}}</span>
                    </div>
                </div>
            </div>
            <div class="py-10 grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
                <!-- Partai -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h4 class="py-4 px-4 text-2md font-bold dark:text-white">7 Partai Jumlah Suara Terbanyak</h4>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NO URUT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Logo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Partai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Suara
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Persentase
                                </th>
                            </tr>
                        </thead>
                        <tbody wire:pool.5s>
                            @if($flags->count() > 0)
                            @foreach($flags as $key => $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$value->no_urut}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{url('/images')}}/{{$value->logo}}" alt="" width="42px">
                                </th>
                                <td class="px-6 py-4">
                                    {{$value->nama_partai}}
                                </td>
                                <td class="px-6 py-4" wire:poll.5s>
                                    @if($value->flagCount->count() > 0)
                                    {{ number_format( $value->flagCount->sum('count') , 0 , '.' , ',' ); }}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td class="px-6 py-4" wire:poll.5s>
                                    @if($value->flagCount->count() > 0)
                                    {{ number_format(($value->flagCount->sum('count') / $sum_all_count_flag) * 100,2,",",".") }} %
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Calon -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h4 class="py-4 px-4 text-2md font-bold dark:text-white">Nominasi Suara Terbanyak</h4>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No Urut
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Calon DPR
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Suara
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Persentase
                                </th>
                            </tr>
                        </thead>
                        <tbody wire:pool.5s>
                            @if($legislatives->count() > 0)
                            @foreach($legislatives as $key => $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$value->no_urut}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$value->nama_calon}}
                                </td>
                                <td class="px-6 py-4" wire:poll.5s>
                                    @if($value->legislativeCount->count() > 0)
                                    {{ number_format( $value->legislativeCount->sum('count') , 0 , '.' , ',' ); }}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($value->legislativeCount->count() > 0)
                                    {{ number_format(($value->legislativeCount->sum('count') / $sum_all_count_legislative) * 100, 2,",",".")}} %
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3" style="height: 32rem;">
                <livewire:livewire-column-chart key="{{ $columnChartModelFlag->reactiveKey() }}" :column-chart-model="$columnChartModelFlag" />
                <livewire:livewire-column-chart key="{{ $columnChartModelLegislative->reactiveKey() }}" :column-chart-model="$columnChartModelLegislative" />
            </div>
            @endif
            @else
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3 2xl:grid-cols-3">
                <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Jumlah Suara Masuk
                        </h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white" wire:poll.5s>{{ number_format( $jumlah_suara_masuk , 0 , '.' , ',' ); }}</span>
                    </div>
                </div>
                <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Jumlah Suara Sah
                        </h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white" wire:poll.5s>{{ number_format( $jumlah_suara_sah , 0 , '.' , ',' ); }}</span>
                    </div>
                </div>
                <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Jumlah Suara Tidak Sah
                        </h3>
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white" wire:poll.5s>{{number_format( $jumlah_suara_tidak_sah , 0 , '.' , ',' );}}</span>
                    </div>
                </div>
            </div>
            <div class="py-10 grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
                <!-- Partai -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h4 class="py-4 px-4 text-2md font-bold dark:text-white">7 Partai Jumlah Suara Terbanyak</h4>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NO URUT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Logo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Partai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Suara
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Persentase
                                </th>
                            </tr>
                        </thead>
                        <tbody wire:pool.5s>
                            @if($flags->count() > 0)
                            @foreach($flags as $key => $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$value->no_urut}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{url('/images')}}/{{$value->logo}}" alt="" width="42px">
                                </th>
                                <td class="px-6 py-4">
                                    {{$value->nama_partai}}
                                </td>
                                <td class="px-6 py-4" wire:poll.5s>
                                    @if($value->flagCount->count() > 0)
                                    {{ number_format( $value->flagCount->sum('count') , 0 , '.' , ',' ); }}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td class="px-6 py-4" wire:poll.5s>
                                    @if($value->flagCount->count() > 0)
                                    {{ number_format(($value->flagCount->sum('count') / $sum_all_count_flag) * 100,2,",",".") }} %
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Calon -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h4 class="py-4 px-4 text-2md font-bold dark:text-white">Nominasi Suara Terbanyak</h4>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No Urut
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Calon DPR
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Suara
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Persentase
                                </th>
                            </tr>
                        </thead>
                        <tbody wire:pool.5s>
                            @if($legislatives->count() > 0)
                            @foreach($legislatives as $key => $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$value->no_urut}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$value->nama_calon}}
                                </td>
                                <td class="px-6 py-4" wire:poll.5s>
                                    @if($value->legislativeCount->count() > 0)
                                    {{ number_format( $value->legislativeCount->sum('count') , 0 , '.' , ',' ); }}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($value->legislativeCount->count() > 0)
                                    {{ number_format(($value->legislativeCount->sum('count') / $sum_all_count_legislative) * 100, 2,",",".")}} %
                                    @else
                                    0
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3" style="height: 32rem;">
                <livewire:livewire-column-chart key="{{ $columnChartModelFlag->reactiveKey() }}" :column-chart-model="$columnChartModelFlag" />
                <livewire:livewire-column-chart key="{{ $columnChartModelLegislative->reactiveKey() }}" :column-chart-model="$columnChartModelLegislative" />
            </div>
            @endif
        </div>
        @livewireChartsScripts
</div>