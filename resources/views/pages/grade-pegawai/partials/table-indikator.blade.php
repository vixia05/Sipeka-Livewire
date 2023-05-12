
@forelse ($indikators as $indikator)
    {{-- Header --}}
    <h3 class="px-8 text-lg font-medium text-slate-700">{{ $indikator->indikator }}</h3>

    {{-- Table --}}
    <div class="overflow-hidden">
        <div class="p-6 text-gray-900">
            {{-- Table Grade --}}
            <div class="relative w-full overflow-x-auto">
                <div class="relative border rounded-lg w-max">
                    <table class="overflow-x-auto text-sm text-left text-gray-600 table-fixed dark:text-gray-400">
                        <thead class="text-xs text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-4 leading-tight text-center w-30">
                                    No
                                </th>
                                <th scope="col" class="sticky left-0 px-3 py-4 leading-tight bg-gray-200 w-30">
                                    NP / Nama
                                </th>
                                @foreach ($indikator->subIndikator as $subIndikator)
                                    <th scope="col" class="w-24 px-3 py-4 text-center">
                                        {{ $subIndikator->sub_indikator }}
                                    </th>
                                @endforeach
                                <th scope="col" class="px-3 py-4 leading-tight text-center w-30">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($grades as $grade)
                            <tr
                                class="leading-5 transition duration-300 ease-in-out bg-white border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-200/25">
                                {{-- Nomor --}}
                                <td scope="row"
                                    class="px-3 py-4 font-medium leading-tight text-center text-gray-900 border-r whitespace-nowrap dark:text-white">
                                    {{ $grade->id }}
                                </td>

                                {{-- Nama / NP --}}
                                <td class="sticky left-0 px-3 py-4 leading-tight border-r backdrop-blur-sm backdrop-filter whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold leading-5 text-slate-600">{{ $grade->np_user }}</span>
                                        <span class="text-sm leading-5 text-slate-600">{{ $grade->userDetails->nama }}</span>
                                    </div>
                                </td>

                                @foreach ($indikator->subIndikator as $subIndikator)
                                    @foreach ($grade->poinPegawai->where('id_sub_indikator',$subIndikator->id) as $poinSubIndikator)
                                        <td class="px-3.5 py-4 text-center border-r">
                                            {{ $poinSubIndikator->poin }}
                                        </td>
                                    @endforeach
                                @endforeach

                                {{-- Action --}}
                                <td class="px-3 py-4 leading-tight text-center">
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
                                class="leading-5 transition duration-300 ease-in-out bg-white border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-200/25">
                                No Data
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End Table Indikator --}}

        </div>
    </div>
@empty

@endforelse
