<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;
use App\Models\SubIndikator;
use App\Models\EvaluasiPenilaian;
use App\Models\NilaiPegawai;
use App\Models\PoinIndikator;
use App\Models\PoinPegawai;
use App\Models\UserDetails;
use Carbon\Carbon;

class EntryNilaiController extends Component
{
    public $poin,$month;
    public $successModal = false;

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
        return view('pages.entry-nilai.main',[
            'indikators' => $indikator,
            'subIndikators' => $subIndikator,
            'userDetails' => $userDetails,
        ]);
    }

    /** Store Nilai */
    public function storeNilai()
    {
        $getUsrDet  = UserDetails::all();
        $getSubInd  = SubIndikator::all();
        $getIndNil  = IndikatorPenilaian::all();
        $convMonth  = $this->month->format('F-Y');

        if ($this->poin !== null)
        {
            foreach ($getUsrDet as $user)
            {
                // Add Parent for Nilai Pegawai
                $createNilai = NilaiPegawai::updateOrCreate([
                    'np_user' => $user->np_user,
                    'bulan' => $convMonth,
                ]);

                // Store Sub Indikator Poin for User
                foreach ($this->poin[$user->np_user] as $key => $subPoin)
                {
                    $subIndById = SubIndikator::where('id',$key);
                    $evaluasi   = EvaluasiPenilaian::where('id_sub_indikator',$subIndById->value('id'))
                                                ->where('start','<=',$subPoin)
                                                ->where('end','>=',$subPoin)
                                                ->value('evaluasi');

                    $storeSubPoin = PoinPegawai::updateOrCreate(
                        [
                            'id_indikator'      => $subIndById->value('id_indikator_penilaian'),
                            'id_sub_indikator'  => $subIndById->value('id'),
                            'id_nilai_pegawai'  => $createNilai->id,
                        ],
                        [
                            'poin'      => $subPoin,
                            'evaluasi'  => $evaluasi,
                        ]
                    );
                }

                // Store Main Indikator Poin for User
                foreach($getIndNil as $indikator)
                {
                    $calcPoinInd = $storeSubPoin->where('id_indikator',$indikator->id)
                                            ->where('id_nilai_pegawai',$createNilai->id)
                                            ->get()
                                            ->map(function ($calc){
                                                $getSubIndikator    = SubIndikator::where('id',$calc->id_sub_indikator);
                                                $bobotNilai = $getSubIndikator->value('bobot_nilai');
                                                $maxPoin    = $getSubIndikator->value('poin_max');
                                                $poin   = $calc->poin;
                                                return divnum($poin,$maxPoin) * $bobotNilai;
                                            })->sum();

                    $storePoinInd = PoinIndikator::updateOrCreate(
                        [
                         'id_indikator'     => $indikator->id,
                         'id_nilai_pegawai' => $createNilai->id
                        ],
                        [
                            'poin'  => round($calcPoinInd,2)
                        ]
                    );
                }

                // Update Nilai Murni User
                foreach(collect($createNilai->id) as $ids)
                {
                    $nilaiMurni  = PoinIndikator::where('id_nilai_pegawai',$ids)
                                            ->get()
                                            ->map(function ($substract){
                                                $nilaiIndikator = IndikatorPenilaian::where('id',$substract->id_indikator)->value('nilai');
                                                return divnum($substract->poin,100) * $nilaiIndikator;
                                            })->sum();

                    $updateNilai = NilaiPegawai::where('id',$ids)->update([
                        'nilai_murni' => round($nilaiMurni,2)
                    ]);
                }


            }

            $getNilai   = NilaiPegawai::where('bulan',$this->month->format('F-Y'))->get();

            // Update Nilai Akhir User
            foreach($getNilai as $nilai)
            {
                $nilaiAkhir = divnum($nilai->nilai_murni,$nilai->sum('nilai_murni')) * 118;

                NilaiPegawai::where('id',$nilai->id)->update([
                    'nilai_akhir' => round($nilaiAkhir,2)
                ]);
            }
            $this->successModal = true;
        }

        else
        {
            //
        }
    }
}
