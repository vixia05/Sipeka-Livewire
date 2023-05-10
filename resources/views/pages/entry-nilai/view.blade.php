<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Entry Nilai Pegawai') }}
    </h2>
</x-slot>
<div class="py-12"
     x-data="{open : @entangle('successModal')}">
     <x-a-modal>
         Update Successfull
     </x-a-modal>
    <div class="max-w-7xl lg:max-w-none sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form>

                </form>
                {{-- Dynamic Table Entry By Indikator --}}
                @foreach ($indikators as $indikator)
                <div class="relative p-2 mt-4 overflow-x-auto rounded-lg">
                   <table class="text-sm text-left text-gray-500 w-fit dark:text-gray-400">
                       <thead class="text-xs text-gray-700 uppercase bg-gray-100 border border-gray-300 dark:bg-gray-700 dark:text-gray-400">
                           <tr>
                               <th scope="col" rowspan="2" class="px-6 py-4 border-r border-gray-300">
                                   NP / Nama
                               </th>
                               <th colspan="14" scope="col" class="px-6 py-4 text-center border-b border-gray-300">
                                   Nilai {{ $indikator->indikator }} ( {{ $indikator->nilai }} ) %
                               </th>
                           </tr>
                           <tr>
                               @forelse ($indikator->SubIndikator as $subIndikator)
                               <th scope="col" class="px-3 py-1.5 text-center border-r border-gray-300 w-[10ch]">
                                   {{ $subIndikator->sub_indikator }}
                               </th>
                               @empty
                               @endforelse
                           </tr>
                       </thead>
                       <tbody>
                        @foreach ($userDetails as $user)
                            <tr class="text-sm leading-5 bg-white border border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-100/60">

                                {{-- NP / Nama --}}
                                <th
                                    class="flex flex-col gap-1 px-6 py-4 font-medium text-gray-900 border-r whitespace-nowrap dark:text-white">
                                    {{ $user->np_user }} <span class="font-light">{{ $user->nama }}</span>
                                </th>

                                {{-- Box Penilaian --}}
                                @foreach ($indikator->SubIndikator as $key => $subIndikator)
                                    <td class="px-4 border-r">
                                        <x-text-input
                                        id="sub{{ $subIndikator->id }}np{{ $user->np_user }}"
                                        wire:model='poin.{{ $user->np_user }}.{{ $subIndikator->id }}'
                                        type="number"
                                        max="120"
                                        class="block mx-auto mt-1 w-[7ch]"
                                        />
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                       </tbody>
                   </table>
               </div>
                @endforeach
                <button type="button" wire:click='storeNilai'
                    class="px-4 py-1 font-semibold text-green-100 transition duration-150 ease-in-out bg-green-500 rounded shadow-md w-fit shadow-green-500/40 brightness-110 hover:brightness-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-5 h-5">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                </button>
                {{-- End Table Entry --}}
            </div>
        </div>
    </div>
</div>
