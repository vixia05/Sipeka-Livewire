<div class="pb-4 max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="px-8 py-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            {{-- Header --}}
            <h4 class="pb-3 font-semibold leading-tight text-gray-800 uppercase border-b dark:text-gray-200">Data
                Pegawai</h4>

            <div class="pb-6 mt-6 space-y-6">
                {{-- Bulan NKI --}}
                <div>
                    <x-input-label for="bulanPenilaian" :value="__('Bulan Penilaian')" />

                    <x-text-input wire:model='tglPenilaian' id="bulanPenilaian" name="bulanPenilaian" type="date" class="block w-full mt-1"
                        :value="old('bulanPenilaian')" required autofocus autocomplete="bulanPenilaian" />

                    <x-input-error class="mt-2" :messages="$errors->get('bulanPenilaian')" />
                </div>

                <div class="flex gap-3">

                    <!-- NP User -->
                    <div>
                        <x-input-label for="npPegawai" :value="__('NP')" />

                        <select id="npPegawai" wire:model='npPegawai' wire:change='selectPegawai()'
                            class="block mt-1 text-sm border-gray-300 rounded-lg shadow-sm w-fit focus:border-indigo-500 focus:ring-indigo-500"
                            required autofocus autocomplete="npPegawai">
                            <option>-</option>
                            <option value="I444">I444</option>
                        </select>

                        <x-input-error class="mt-2" :messages="$errors->get('npPegawai')" />
                    </div>

                    <!-- Nama User -->
                    <div class="w-full">
                        <x-input-label for="namaPegawai" :value="__('Nama Pegawai')" />

                        <x-text-input id="namaPegawai" type="text" class="block w-full mt-1" wire:model='namaPegawai' required autofocus
                            autocomplete="namaPegawai" />

                        <x-input-error class="mt-2" :messages="$errors->get('namaPegawai')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
