<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;
use App\Models\EvaluasiPenilaian;
use App\Models\UserDetails;
use Carbon\Carbon;

class EntryNilaiController extends Component
{
    public $npPegawai,$namaPegawai;
    public $tglPenilaian;
    public $evaluasi,$poin;

    protected $listeners = [
        'evaluasi.* '
    ];

    protected $rules = [
        'poin.*'
    ];

    public function mount()
    {
        $this->tglPenilaian = Carbon::today()->format('Y-m-d');
    }

    public function render()
    {
        $indikator = IndikatorPenilaian::all();
        return view('pages.entry-nilai.main',[
            'indikators' => $indikator,
        ]);
    }

    public function selectPegawai()
    {
        $this->namaPegawai = UserDetails::where('np_user',$this->npPegawai)->value('nama');
    }

    public function evaluasiSkor($poin,$idSub)
    {
        $evaluasi = EvaluasiPenilaian::where('id_sub_indikator',$idSub)
                                ->where(function ($query) use ($poin) {
                                    $query->where('start','<=',$poin);
                                    $query->where('end','>=',$poin);
                                })->value('evaluasi');


    }
}
