<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;
use App\Models\SubIndikator;
use App\Models\EvaluasiPenilaian;
use App\Models\NilaiPegawai;
use App\Models\PoinIndikator;
use App\Models\PoinSubIndikator;
use App\Models\UserDetails;
use Carbon\Carbon;

class EntryNilaiController extends Component
{
    public $poin,$month;

    protected $rules = [

    ];

    public function mount()
    {
        $this->month = today();
    }

    public function render()
    {
        $indikator = IndikatorPenilaian::all();
        $subIndikator = SubIndikator::all();
        $userDetails  = UserDetails::all();
        return view('pages.entry-nilai.view',[
            'indikators' => $indikator,
            'subIndikators' => $subIndikator,
            'userDetails' => $userDetails,
        ]);
    }

    public function test()
    {
        $getNP = UserDetails::all();

        // dd($this->poin);
        foreach($getNP as $np)
        {
            $createNilai = NilaiPegawai::updateOrCreate([
                'np_user' => $np->np_user,
                'bulan' => $this->month
            ]);

            $createIndikator = PoinIndikator::create([
                'id_nilai_pegawai' => $createNilai->id,
            ]);

            foreach($this->poin[$np->np_user] as $key => $poinPegawai)
            {
                $subIndikator = SubIndikator::where('id',$createIndikator->id);
                $insertSubPoin = PoinSubIndikator::updateOrCreate(
                    [
                        'sub_indikator' => $subIndikator->value('sub_indikator'),
                        'id_poin_indikator_penilaian' => $createIndikator->id,
                    ],
                    [
                        'poin' => $poinPegawai,
                        'evaluasi' => EvaluasiPenilaian::where('id_sub_indikator',$subIndikator->value('id'))->value('evaluasi'),
                    ]
                );
            }
        }
    }

















    // public $npPegawai,$namaPegawai;
    // public $tglPenilaian;
    // public $evaluasi,$poin;

    // protected $listeners = [
    //     'evaluasi.* '
    // ];

    // protected $rules = [
    //     'poin.*'
    // ];

    // public function mount()
    // {
    //     $this->tglPenilaian = Carbon::today()->format('Y-m-d');
    // }

    // public function render()
    // {
    //     $indikator = IndikatorPenilaian::all();
    //     return view('pages.entry-nilai.main',[
    //         'indikators' => $indikator,
    //     ]);
    // }

    // public function selectPegawai()
    // {
    //     $this->namaPegawai = UserDetails::where('np_user',$this->npPegawai)->value('nama');
    // }

    // public function evaluasiSkor($poin,$idSub)
    // {
    //     $evaluasi = EvaluasiPenilaian::where('id_sub_indikator',$idSub)
    //                             ->where(function ($query) use ($poin) {
    //                                 $query->where('start','<=',$poin);
    //                                 $query->where('end','>=',$poin);
    //                             })->value('evaluasi');


    // }
}
