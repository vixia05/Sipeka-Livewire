<div class="pb-4 max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="px-8 py-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            {{-- Header --}}
            <h4 class="pb-3 font-semibold leading-tight text-gray-800 uppercase border-b dark:text-gray-200">Absensi</h4>
            <div class="pb-6 mt-6 space-y-6">
                <div class="flex flex-col gap-6">
                    {{-- Cuti Dokter --}}
                    <div class="flex w-full gap-6">
                        <div>
                            <x-input-label for="cutiDokter" :value="__('Cuti Dokter')" />

                            <x-text-input id="cutiDokter" type="number" placeholder="Jml CD" min="0"
                                class="block w-full mt-1 placeholder:text-xs" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="skorCD" :value="__('Nilai')" />

                            <x-text-input id="cutiDokter" type="number" placeholder="Nilai CD" min="0"
                                class="block w-full mt-1 bg-slate-200/60" disabled />
                        </div>
                    </div>

                    {{-- Surat Merah / IDT --}}
                    <div class="flex w-full gap-6">
                        <div>
                            <x-input-label for="izin" :value="__('Surat Merah / IDT')" />

                            <x-text-input id="izin" type="number" placeholder="Jml Izin" min="0"
                                class="block w-full mt-1 placeholder:text-xs" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="skorIzin" :value="__('Nilai')" />

                            <x-text-input id="skorIzin" type="number" placeholder="Nilai Izin" min="0"
                                class="block w-full mt-1 bg-slate-200/60" disabled />
                        </div>
                    </div>

                    {{-- KeterlambatanF --}}
                    <div class="flex w-full gap-6">
                        <div>
                            <x-input-label for="terlambat" :value="__('Keterlambatan')" />

                            <x-text-input id="terlambat" type="number" placeholder="Jml Terlambat" min="0"
                                class="block w-full mt-1 placeholder:text-xs" />
                        </div>

                        <div class="w-full">
                            <x-input-label for="skorTerlambat" :value="__('Nilai')" />

                            <x-text-input id="skorTerlambat" type="number" placeholder="Nilai Keterlambatan"
                                min="0" class="block w-full mt-1 bg-slate-200/60" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
