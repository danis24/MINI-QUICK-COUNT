<div>
    <livewire:navbar>
    <div class="container mx-auto mt-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Desa / TPS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penanggung Jawab
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Suara Masuk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Suara Sah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Suara Tidak Sah
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($villages->count() > 0)
                    @foreach($villages as $key => $value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$key + 1}}
                        </th>
                        <td class="px-6 py-4">
                            {{$value->nama_desa}}
                        </td>
                        <td class="px-6 py-4">
                           @if($value->user != '')
                           {{$value->user->name}}
                           @else
                           -
                           @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($value->jumlah_suara_masuk  == null)
                            0
                            @else
                            {{$value->jumlah_suara_masuk}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($value->jumlah_suara_sah  == null)
                            0
                            @else
                            {{$value->jumlah_suara_sah}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($value->jumlah_suara_tidak_sah  == null)
                            0
                            @else
                            {{$value->jumlah_suara_tidak_sah}}
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