<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Grade Pegawai') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col w-full">
            <h3 class="px-8 text-lg font-medium text-slate-700">Grade Pegawai</h3>
            @include('pages.grade-pegawai.partials.table-grade')
            <h3 class="ml-8 pr-8 text-lg font-semibold text-slate-800 pb-2 mb-6 pt-4 border-b-2">Poin Indikator Penilaian</h3>
            @include('pages.grade-pegawai.partials.table-indikator')
        </div>
    </div>
</div>

