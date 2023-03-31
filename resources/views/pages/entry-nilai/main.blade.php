<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Penilaian Pegawai') }}
    </h2>
</x-slot>

<div class="py-10">
    <form>
        @csrf
        {{-- Form Data Pegawai --}}
        @include('pages.entry-nilai.partials.data-pegawai')
        {{-- End Data PEgawai Section --}}

        {{-- Absensi Section --}}
        @include('pages.entry-nilai.partials.absensi')
        {{-- End Absensi Section --}}

        @forelse ($indikators as $indikator)
            <div class="pb-4 max-w-7xl sm:px-6 lg:px-8">
                <div class="px-8 py-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    {{-- Title Card --}}
                    <h4 class="pb-2 font-semibold leading-tight text-gray-800 uppercase border-b dark:text-gray-200">
                        {{ $indikator->indikator }}</h4>
                    <div class="pb-6 mt-6 space-y-6">

                        {{-- Foreach Field Penilaian --}}
                        <div class="flex flex-col gap-6">
                            @foreach ($indikator->SubIndikator as $subIndikator)
                                <div class="flex w-full gap-6">
                                    <div>
                                        <x-input-label for="ind{{ $subIndikator->id_indikator_penilaian }}sub{{ $subIndikator->id }}" value="{{ $subIndikator->sub_indikator }}" />

                                        <x-text-input wire:model='poin.{{ $subIndikator->id }}' wire:change="evaluasiSkor($event.target.value,{{ $subIndikator->id_indikator_penilaian }})" id="ind{{ $subIndikator->id_indikator_penilaian }}sub{{ $subIndikator->id }}" type="number" placeholder="Skor" min="0"
                                            class="block w-full mt-1 placeholder:text-xs" />
                                    </div>

                                    <div class="w-full">
                                        <textarea wire:model='evaluasi'
                                            class="block w-full mt-6 text-sm border-gray-300 rounded-md shadow-sm bg-slate-100 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                            rows="3" disabled></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </form>
</div>
