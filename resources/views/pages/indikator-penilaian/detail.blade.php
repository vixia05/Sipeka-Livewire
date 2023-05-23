<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ $indikator->indikator }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                {{-- Tambah Indikator --}}
                <div class="flex justify-end">
                    <a href="{{ route('addIndikator') }}"
                        class="px-4 py-1 font-semibold transition duration-150 ease-in-out border rounded shadow-md border-violet-500 bg-inherit text-violet-500 shadow-violet-500/40 brightness-110 hover:brightness-90">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="inline-block w-5 h-5">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Tambah Indikator
                    </a>
                </div>

                {{-- Table Indikator --}}
                <div class="relative mt-4 overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    Indikator
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Area Penilaian
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    Bobot Nilai
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($indikators as $indikator)
                            <tr
                                class="leading-5 transition duration-300 ease-in-out bg-white border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-200/25">
                                {{-- Indikator --}}
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $indikator->indikator }}
                                </th>

                                {{-- Cakupan Penilaian --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <ul class="space-y-1 text-xs font-semibold leading-tight">
                                        @forelse ($indikator->SubIndikator as $subIndikator)
                                        <li><div class="rounded-full bg-black p-0.5 inline-block mb-0.5"></div> {{ $subIndikator->sub_indikator }}</li>
                                        @empty
                                        -
                                        @endforelse
                                    </ul>
                                </td>

                                {{-- Bobot Nilai --}}
                                <td class="px-6 py-4 text-center">
                                    {{ $indikator->nilai }} %
                                </td>

                                {{-- Action --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button type="button"
                                            class="px-4 py-1 font-semibold text-blue-100 transition duration-150 ease-in-out bg-blue-600 rounded shadow-md shadow-blue-600/40 brightness-110 hover:brightness-100">
                                            Detail
                                        </button>
                                        <button type="button"
                                            class="px-4 py-1 font-semibold text-green-100 transition duration-150 ease-in-out bg-green-600 rounded shadow-md shadow-green-600/40 brightness-110 hover:brightness-100">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="px-4 py-1 font-semibold text-red-100 transition duration-150 ease-in-out bg-red-600 rounded shadow-md shadow-red-600/40 brightness-110 hover:brightness-100">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr
                                class="leading-5 bg-white border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-100/60">
                                No Data
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- End Table Indikator --}}

            </div>
        </div>
    </div>
</div>
