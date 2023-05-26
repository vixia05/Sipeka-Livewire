<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $detailIndikator->indikator }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">

                {{-- Tambah Indikator --}}
                <div class="flex ml-3">
                    <h4 class="text-xl font-semibold uppercase text-slate-600">{{ $detailIndikator->indikator }}</h4>
                </div>

                {{-- Table Indikator --}}
                <div class="relative mt-4 overflow-x-auto rounded-lg border-x">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4 w-36">
                                    Area Penilaian
                                </th>
                                <th scope="col" class="w-24 px-6 py-4">
                                    Bobot Nilai
                                </th>
                                <th scope="col" class="w-24 px-6 py-4 text-center">
                                    Poin
                                </th>
                                <th scope="col" class="px-6 py-4 text-center w-fit">
                                    Evaluasi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailIndikator->SubIndikator as $subIndikator)
                                <tr
                                    class="leading-5 transition duration-300 ease-in-out bg-white hover:bg-gray-200/25 dark:border-gray-700 dark:bg-gray-800">
                                    {{-- Indikator --}}
                                    <th rowspan="{{ count($subIndikator->evaluasi) + 1 }}"
                                        class="px-3 py-2 border-b border-r whitespace-nowrap text-slate-700 dark:text-white">
                                        {{ $subIndikator->sub_indikator }}
                                    </th>

                                    {{-- Bobot Nilai --}}
                                    <td rowspan="{{ count($subIndikator->evaluasi) + 1 }}"
                                        class="px-6 py-2 text-center border-b">
                                        {{ $subIndikator->bobot_nilai }}
                                    </td>
                                </tr>
                                @foreach ($subIndikator->evaluasi->sortBy('start') as $evaluasi)
                                    <tr class="leading-5 transition duration-300 ease-in-out bg-white hover:bg-gray-200/25 dark:border-gray-700 dark:bg-gray-800">
                                        {{-- Poin --}}
                                        <td class="border-b border-x">
                                            <div class="px-3 py-2 text-center">
                                                {{ $evaluasi->start }} - {{ $evaluasi->end }}
                                            </div>
                                        </td>
                                        <td class="border-b border-x">
                                            <div class="px-2 py-2">
                                                {{ $evaluasi->evaluasi }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- End Table Indikator --}}

            </div>
        </div>
    </div>
</x-app-layout>
