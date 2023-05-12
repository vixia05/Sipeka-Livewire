<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Entry Nilai Pegawai') }}
    </h2>
</x-slot>
<div class="py-12" x-data="{ open: @entangle('successModal') }">
    <x-a-modal>
        Update Successfull
    </x-a-modal>
    <div class="max-w-7xl sm:px-6 lg:max-w-none lg:px-8 w-max">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form>

                </form>
            </div>
            {{-- Dynamic Table Entry By Indikator --}}
            @foreach ($indikators as $indikator)
                <div class="relative mt-4 overflow-x-auto rounded-lg border-y w-max">
                    <table class="table-fixed">
                        <thead class="text-xs text-gray-700 bg-gray-100 border-gray-300 border-x dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" rowspan="2"
                                    class="sticky left-0 py-4 bg-gray-100 border-r border-gray-300">
                                    NP / Nama
                                </th>
                                <th colspan="14" scope="col"
                                    class="px-6 py-4 text-center border-b border-gray-300">
                                    Nilai {{ $indikator->indikator }} ( {{ $indikator->nilai }} ) %
                                </th>
                            </tr>
                            <tr>
                                @forelse ($indikator->SubIndikator as $subIndikator)
                                    <th scope="col" class="w-24 border-r border-gray-300 px-3 py-1.5 text-center">
                                        {{ $subIndikator->sub_indikator }}
                                    </th>
                                @empty
                                @endforelse
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userDetails as $user)
                                <tr class="text-sm leading-5 transition duration-150 ease-in-out bg-white border border-b hover:bg-gray-200/20 dark:border-gray-700 dark:bg-gray-800">

                                    {{-- NP / Nama --}}
                                    <th
                                        class="sticky left-0 flex flex-col gap-1 px-6 py-3 font-medium text-gray-900 bg-white border-r whitespace-nowrap text-start dark:text-white">
                                        {{ $user->np_user }} <span class="font-light">{{ $user->nama }}</span>
                                    </th>

                                    {{-- Box Penilaian --}}
                                    @foreach ($indikator->SubIndikator as $key => $subIndikator)
                                        <td class="w-[8ch] border-r px-3">
                                            <div
                                                class="mx-auto h-full w-full border-b-2 transition duration-[400ms] ease-in-out focus-within:border-sky-400 focus-within:brightness-100 hover:border-sky-400 hover:brightness-125">
                                                <input type="number" max="120" min="0"
                                                    class="w-full text-sm text-right border-none bg-inherit text-slate-600 focus:ring-0"
                                                    id="sub{{ $subIndikator->id }}np{{ $user->np_user }}"
                                                    wire:model='poin.{{ $user->np_user }}.{{ $subIndikator->id }}'>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
            {{-- End Table Entry --}}
            <button type="button" wire:click='storeNilai'
                class="float-right px-4 py-1 my-4 font-semibold text-green-100 transition duration-150 ease-in-out bg-green-500 rounded shadow-md w-fit shadow-green-500/40 brightness-110 hover:brightness-100">
                Simpan
            </button>
        </div>
    </div>
</div>
