<div>
    <livewire:navbar>
    <div class="container mx-auto mt-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                <tbody>
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
                            {{ $value->legislativeCount->sum('count') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format(($value->legislativeCount->sum('count') / $sum_all_count) * 100, 2,",",".")}} %
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>