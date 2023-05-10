<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\NilaiPegawai;
use App\Models\IndikatorPenilaian;

class GradePegawaiController extends Component
{
    public $periode;

    public function mount()
    {
        $this->periode = today()->format('F-Y');
    }

    public function render()
    {
        return view('pages.grade-pegawai.view',[
            'grades'     => $this->dataGrade(),
            'indikators' => $this->dataIndikator(),
        ]);
    }

    private function dataGrade()
    {
        return NilaiPegawai::where('bulan',$this->periode)->get();
    }

    private function dataIndikator()
    {
        return IndikatorPenilaian::all();
    }

}
