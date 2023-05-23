<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;
use App\Models\SubIndikator;
use App\Models\EvaluasiPenilaian;

class AddIndikatorPenilaianController extends Component
{
    public $indikator;
    public $nilaiIndikator;
    public $maxPoin = [''];
    public $evaluasi;
    public $formEvaluasi;
    public $subIndikators = [''];
    public $start = [];
    public $end;

    public $saved = false;

    public function mount()
    {
        $this->end["end0"]  = [''];
        $this->start["start0"]    = [''];
        $this->evaluasi["evaluasi0"] = [''];
        $this->formEvaluasi["sub0"] = [''];
    }

    public function render()
    {
        // dd($this->formEvaluasi);
        return view('livewire.add-indikator-penilaian');
    }

    /**
     * Menambahkan Sub Indikator
     */
    public function addIndikator($index)
    {
        $this->maxPoin[]  = '';
        $this->subIndikators[]  = '';
        $this->end["end".$index+1]  = [''];
        $this->start["start".$index+1]    = [''];
        $this->evaluasi["evaluasi".$index+1] = [''];
        $this->formEvaluasi["sub".$index+1] = [''];
    }


    /**
     * Delete Indikator
     */
    public function deleteIndikator($index)
    {
        unset($this->maxPoin[$index]);
        unset($this->subIndikators[$index]);
        unset($this->end["end".$index]);
        unset($this->start["start".$index]);
        unset($this->evaluasi["evaluasi".$index]);
        unset($this->formEvaluasi["sub".$index]);

        for($i = 0 ; $i < count($this->formEvaluasi) ; $i++)
        {
            $cIndex[]   = "sub".$i;
            $cIndexEnd[]    = "end".$i;
            $cIndexStart[]  = "start".$i;
            $cIndexEvaluasi[]   = "start".$i;
        }

        $this->maxPoin = array_values($this->maxPoin);
        $this->subIndikators = array_values($this->subIndikators);

        $this->end = array_combine($cIndexEnd,$this->end);
        $this->start = array_combine($cIndexStart,$this->start);
        $this->evaluasi = array_combine($cIndexEvaluasi,$this->start);
        $this->formEvaluasi = array_combine($cIndex,$this->formEvaluasi);
        // dd($this->formEvaluasi);

    }


    /**
     * Menambahkan Form Evaluasi
     * Berdasarkan Indikatornya
     */
    public function addEvaluasi($idSub, $index)
    {
        // dd($idSub);
        if($this->formEvaluasi["sub".$idSub] ?? null)
        {
            $this->end["end".$idSub][]  = '';
            $this->start["start".$idSub][]    = '';
            $this->evaluasi["evaluasi".$idSub][] = '';
            $this->formEvaluasi["sub".$idSub][] = '';
        }
        else
        {
            $this->end["end".$idSub]  = [''];
            $this->start["start".$idSub]    = [''];
            $this->evaluasi["evaluasi".$idSub]   = [''];
            $this->formEvaluasi["sub".$idSub]   = [''];
        }
        // dd($this->formEvaluasi);
    }


    /**
     * Menghapus Form Evaluasi
     * Berdasarkan Indikatornya
     */
    public function deleteEvaluasi($idSub, $index)
    {
        if(count($this->formEvaluasi[$idSub]) > 1)
        {
            unset($this->end[$idSub][$index]);
            unset($this->start[$idSub][$index]);
            unset($this->evaluasi[$idSub][$index]);
            unset($this->formEvaluasi[$idSub][$index]);

            $this->end[$idSub]      = array_values($this->end[$idSub]);
            $this->start[$idSub]    = array_values($this->start[$idSub]);
            $this->evaluasi[$idSub] = array_values($this->evaluasi[$idSub]);
            $this->formEvaluasi[$idSub] = array_values($this->formEvaluasi[$idSub]);
        }
        else
        {
            //
        }
    }

    private function mergeEvaArr()
    {
        return array_merge(
            // $this->subIndikators,
            $this->start,
            $this->end,
            $this->evaluasi
        );
    }

    private function resetField()
    {
        session()->flash('saved');

        $this->indikator = '';
        $this->nilaiIndikator = '';
        $this->subIndikators = [''];
        $this->maxPoin = [''];

        $this->end      = [''];
        $this->start    = [''];
        $this->evaluasi = [''];
        $this->formEvaluasi = [''];

        $this->end["end0"]      = [''];
        $this->start["start0"]  = [''];
        $this->evaluasi["evaluasi0"]    = [''];
        $this->formEvaluasi['sub0']     = [''];
    }

    public function store()
    {

        // 1. Buat Indikator Baru Beserta Bobot Nilaianya
        $createIndikator = IndikatorPenilaian::updateOrCreate(
                                ['indikator' => $this->indikator],
                                ['nilai' => $this->nilaiIndikator]
                            );

        // 2.Insert Cakupan Penilaian Dari Indikator Yang Dibuat
        foreach($this->subIndikators as $key => $sub)
        {
            $createSubIndikator = SubIndikator::updateOrCreate(
                                [
                                    'sub_indikator' => $sub,
                                    'id_indikator_penilaian' => $createIndikator->id,
                                ],
                                [
                                    'bobot_nilai'   => round(100 / count($this->subIndikators),2),
                                    'poin_max'  => 120,
                                ]);

            // foreach untuk range dan evaluasi
            foreach($this->mergeEvaArr()["start".$key] as $_key => $start)
            {
                // dump($start);
                // 3. Insert start range pertama untuk buat Id-nya
                $addStart = EvaluasiPenilaian::updateOrCreate(
                                [
                                    'id_sub_indikator' => $createSubIndikator->id,
                                    'start' => $start == null ? 0 : $start
                                ],
                            );

                // 4. Insert end dan evaluasi berdasarkan id yang di buat di atas
                EvaluasiPenilaian::where('id',$addStart->id)
                            ->update([
                                'end'=> $this->mergeEvaArr()["end".$key][$_key] == null ? 0 : $this->mergeEvaArr()["end".$key][$_key],
                                'evaluasi'=> $this->mergeEvaArr()["evaluasi".$key][$_key] == null ? 0 : $this->mergeEvaArr()["evaluasi".$key][$_key],
                            ]);
            }
        }

        $this->resetField();

    }
}
