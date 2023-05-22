<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Tambah Indikator Penilaian') }}
    </h2>
</x-slot>

{{-- Main Content --}}
<div class="py-12">
    <div class="max-w-7xl sm:px-6 lg:px-8">
        @if ($saved)
            <div class="rounded-md border border-green-600 bg-green-500 p-2 text-white">
                Indikator Baru Berhasil Ditambah
            </div>
        @endif
        <form wire:submit.prevent='saveForm'>
            @csrf
            {{--  Indikator Penilaian  --}}
            <div
                class="overflow-hidden bg-white px-8 py-6 shadow-sm drop-shadow transition duration-150 ease-in-out focus-within:shadow-md focus-within:drop-shadow-md dark:bg-gray-800 sm:rounded-lg">
                {{-- <!-- Header --> --}}
                <h4 class="mb-4 border-b pb-3 font-semibold uppercase leading-tight text-gray-800 dark:text-gray-200">
                    Indikator Penilaian
                </h4>

                <div class="flex flex-row gap-4">

                    {{-- <!-- Judul Keriteria --> --}}
                    <div>
                        <x-input-label for="title" value="Judul Indikator" />

                        <x-text-input wire:model.lazy='indikator' id="title" type="text" class="mt-1 block w-fit" required />
                    </div>

                    {{-- <!-- Total Skor --> --}}
                    <div class="w-full">
                        <x-input-label for="sumSkor" value="Bobot Nilai" />

                        <x-text-input wire:model.lazy='nilaiIndikator' id="sumSkor" type="number" class="mt-1 block w-full" min="0"
                            max="100" required />
                    </div>

                    <!--  -->
                </div>
            </div>

            {{-- Cakupan Penilaian  --}}
            <div
                class="mt-6 overflow-hidden bg-white px-8 py-6 shadow-sm drop-shadow transition duration-100 ease-in-out focus-within:shadow-md focus-within:drop-shadow-md dark:bg-gray-800 sm:rounded-lg">
                {{-- <!-- Header --> --}}
                <h4 class="mb-4 border-b pb-3 font-semibold uppercase leading-tight text-gray-800 dark:text-gray-200">
                    Cakupan Penilaian
                </h4>

                {{-- <!-- Main --> --}}
                @foreach ($subIndikators as $index => $subIndikator)
                    <div class="flex flex-row gap-4 border-b-2 pb-6">
                        {{-- <!-- Judul Keriteria --> --}}
                        <div>
                            <x-input-label for="subIndikator" value="Indikator Penilaian" />

                            <x-text-input id="subIndikator" type="text" class="mt-1 block w-fit"
                                wire:key='subIndikators-{{ $index }}'
                                wire:model.lazy='subIndikators.{{ $index }}' required />
                        </div>

                        <div class="flex w-full flex-col gap-4">
                            {{-- <!-- Poin Maksimal --> --}}
                            <div>
                                <x-input-label for="maxSkor" value="Poin Maksimal" />

                                <x-text-input id="maxSkor" type="number" class="mt-1 block w-full" min="0"
                                    wire:key='maxPoin-{{ $index }}' wire:model.lazy='maxPoin.{{ $index }}'
                                    required />
                            </div>

                            @isset($formEvaluasi['sub' . $index])
                                @forelse ($formEvaluasi['sub'.$index] as $index => $eva)
                                    {{-- <!-- Range --> --}}
                                    <div class="flex gap-4">

                                        {{-- <!-- Start Range --> --}}
                                        <div>
                                            <x-input-label for="startRange" value="Range" />

                                            <x-text-input id="startRange" type="number" class="mt-1 block w-full"
                                                wire:model.lazy='start.start{{ $loop->parent->index }}.{{ $index }}'
                                                wire:key='start-sub{{ $loop->parent->index }}{{ $index }}'
                                                min="0" required />
                                        </div>
                                        <span class="mt-4">-</span>

                                        {{-- <!-- End Range --> --}}
                                        <div>
                                            <x-text-input id="endRange" type="number" class="mt-6 block w-full"
                                                wire:model.lazy='end.end{{ $loop->parent->index }}.{{ $index }}'
                                                wire:key='end-sub{{ $loop->parent->index }}{{ $index }}'
                                                min="0" required />
                                        </div>

                                        {{-- <!-- Evaluasi --> --}}
                                        <div class="w-full">
                                            <x-input-label for="evaluasi" value="Evaluasi" />

                                            <textarea
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                                rows="3" wire:model.lazy='evaluasi.evaluasi{{ $loop->parent->index }}.{{ $index }}'></textarea>
                                        </div>

                                        {{-- <!-- Button Tambah Row --> --}}
                                        <div class="mt-6 flex flex-col gap-2">
                                            <button type="button"
                                                wire:click.prevent='addEvaluasi({{ $loop->parent->index }},{{ $index }})'
                                                class="w-fit rounded bg-green-500 px-4 py-1 font-semibold text-green-100 shadow-md shadow-green-500/40 brightness-110 transition duration-150 ease-in-out hover:brightness-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-5 w-5">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                            </button>
                                            @if (count($formEvaluasi['sub' . $loop->parent->index]) > 1)
                                                <button type="button"
                                                    wire:click.prevent='deleteEvaluasi({{ $loop->parent->index }},{{ $index }})'
                                                    class="w-fit rounded bg-red-500 px-4 py-1 font-semibold text-red-100 shadow-md shadow-red-500/40 brightness-110 transition duration-150 ease-in-out hover:brightness-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="h-5 w-5">
                                                        <path fill-rule="evenodd"
                                                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            @endisset
                        </div>
                    </div>

                    {{-- <!-- Button Tambah Cakupan Penilaian --> --}}
                    <div class="mt-6 flex flex-row justify-end gap-2">
                        @if (count($subIndikators) > 1)
                            <button type="button" wire:click.prevent='deleteIndikator({{ $loop->index }})'
                                class="w-fit rounded bg-red-500 px-4 py-1 font-semibold text-red-100 shadow-md shadow-red-500/40 brightness-110 transition duration-150 ease-in-out hover:brightness-100">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="mr-1 inline-block h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                                Indikator
                            </button>
                        @endif
                        @if ($loop->last)
                            <button type="button" wire:click.prevent='addIndikator({{ $loop->index }})'
                                class="w-fit rounded bg-green-500 px-4 py-1 font-semibold text-green-100 shadow-md shadow-green-500/40 brightness-110 transition duration-150 ease-in-out hover:brightness-100">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="inline-block h-5 w-5">
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                Indikator
                            </button>
                        @endif
                    </div>
                @endforeach
                {{-- <!-- Button Tambah Cakupan Penilaian --> --}}
                <div class="mt-4 flex flex-row justify-end gap-2">
                    <button type="button" wire:click.prevent='store'
                        class="w-fit rounded bg-blue-500 px-4 py-1 font-semibold text-blue-100 shadow-md shadow-blue-500/40 brightness-110 transition duration-150 ease-in-out hover:brightness-100">
                        Simpan
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
