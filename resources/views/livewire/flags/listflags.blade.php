<div>
    <livewire:navbar>
    <div class="py-20 container mx-auto mt-10 px-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                <tbody wire:poll.5s>
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
                        <td class="px-6 py-4">
                            @if($value->flagCount->count() > 0)
                            {{$value->flagCount->sum('count')}}
                            @else
                            0
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($value->flagCount->count() > 0)
                            {{ number_format(($value->flagCount->sum('count') / $sum_all_count) * 100,2,",",".") }} %
                            @else
                            0 %
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>