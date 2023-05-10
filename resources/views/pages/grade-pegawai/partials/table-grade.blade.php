
<div class="overflow-hidden">
    <div class="p-6 text-gray-900">
        {{-- Table Grade --}}
        <div class="relative overflow-x-auto rounded-lg border">
            <table class="w-full text-sm text-left text-gray-600 dark:text-gray-400 table-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-2.5 leading-tight text-center">
                            No
                        </th>
                        <th scope="col" class="px-3 py-2.5 leading-tight">
                            NP / Nama
                        </th>
                        <th scope="col" class="px-3 py-2.5 leading-tight text-center">
                            Nilai Murni
                        </th>
                        <th scope="col" class="px-3 py-2.5 leading-tight text-center">
                            Nilai Akhir
                        </th>
                        <th scope="col" class="px-3 py-2.5 leading-tight text-center">
                            Rata-Rata Divisi
                        </th>
                        <th scope="col" class="px-3 py-2.5 leading-tight text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($grades as $grade)
                    <tr
                        class="leading-5 bg-white border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-200/25 transition duration-300 ease-in-out">
                        {{-- Nomor --}}
                        <td scope="row"
                            class="px-3 py-2.5 leading-tight font-medium text-center text-gray-900 whitespace-nowrap dark:text-white border-r">
                            {{ $grade->id }}
                        </td>

                        {{-- Nama / NP --}}
                        <td class="px-3 py-2.5 leading-tight whitespace-nowrap border-r">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold leading-5 text-slate-600">{{ $grade->np_user }}</span>
                                <span class="text-sm leading-5 text-slate-600">{{ $grade->userDetails->nama }}</span>
                            </div>
                        </td>

                        {{-- Nilai Murni --}}
                        <td class="px-3.5 py-2.5 text-right border-r">
                            {{ $grade->nilai_murni }}
                        </td>

                        {{-- Nilai Akhir --}}
                        <td class="px-3.5 py-2.5 text-right border-r">
                            {{ $grade->nilai_akhir }}
                        </td>

                        {{-- Rata Rata Divisi --}}
                        <td class="px-3.5 py-2.5 text-right border-r">
                            118
                        </td>

                        {{-- Action --}}
                        <td class="px-3 py-2.5 leading-tight text-center">
                            <div class="flex justify-center gap-2">
                                <button type="button"
                                    class="px-3 py-1 font-semibold text-blue-100 transition duration-150 ease-in-out bg-blue-600 rounded shadow-md shadow-blue-600/40 brightness-110 hover:brightness-100">
                                    Detail
                                </button>
                                <button type="button"
                                    class="px-3 py-1 font-semibold text-green-100 transition duration-150 ease-in-out bg-green-600 rounded shadow-md shadow-green-600/40 brightness-110 hover:brightness-100">
                                    Edit
                                </button>
                                <button type="button"
                                    class="px-3 py-1 font-semibold text-red-100 transition duration-150 ease-in-out bg-red-600 rounded shadow-md shadow-red-600/40 brightness-110 hover:brightness-100">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr
                        class="leading-5 bg-white border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-200/25 transition duration-300 ease-in-out">
                        No Data
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- End Table Indikator --}}

    </div>
</div>

