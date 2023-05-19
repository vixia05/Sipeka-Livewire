<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;
use App\Models\SubIndikator;
use App\Models\EvaluasiPenilaian;

class AddIndikatorPenilaianController extends Component
{
    public $maxPoin = [];
    public $evaluasi;
    public $formEvaluasi;
    public $subIndikators = [''];
    public $start;
    public $end;

    public $saved = false;

    public function mount()
    {
        // $this->end["sub0"] = [''];
        // $this->start["sub0"] = [''];
        // $this->evaluasi["sub0"] = [''];
        $this->formEvaluasi["sub0"] = [''];
    }

    public function render()
    {
        // dd($this->formEvaluasi);
        return view('livewire.add-indikator-penilaian');
    }

    public function deleteEvaluasi($idSub, $index)
    {
        if($this->formEvaluasi[$idSub] ?? null)
        {
            unset($this->end[$idSub."-".$index]);
            unset($this->start[$idSub."-".$index]);
            unset($this->evaluasi[$idSub."-".$index]);
            unset($this->formEvaluasi[$idSub][$index]);

            $this->formEvaluasi[$idSub] = array_values($this->formEvaluasi[$idSub]);
        }
        else
        {
            //
        }
    }

    public function addEvaluasi($idSub, $index)
    {
        if($this->formEvaluasi[$idSub] ?? null)
        {
            // $this->start[$idSub][] = '';
            // $this->end[$idSub][] = '';
            // $this->evaluasi[$idSub][] = '';
            $this->formEvaluasi[$idSub][] = '';
        }
        else
        {
            // $this->start[$idSub] = [''];
            // $this->end[$idSub] = [''];
            // $this->evaluasi[$idSub] = [''];
            $this->formEvaluasi[$idSub] = [''];
        }
        // dd($this->formEvaluasi);
    }

    public function deleteIndikator($index)
    {
        // foreach ($this->end as $endArr)
        // {
        //     foreach ($sub as $k => $v)
        //         if (substr($k, 0, 12) == 'sessionCount')
        //             $tmp[$k] = $v;
        // }
        dd($this->end["sub0-"]);
        unset($this->maxPoin[$index]);
        unset($this->subIndikators[$index]);
        unset($this->end["sub".$index]);
        unset($this->start["sub".$index]);
        unset($this->evaluasi["sub".$index]);
        unset($this->formEvaluasi["sub".$index]);

        // for($i = 0 ; $i < count($this->formEvaluasi) ; $i++)
        // {
        //     $cIndex[] = "sub".$i;
        // }

        $this->maxPoin = array_values($this->maxPoin);
        $this->subIndikators = array_values($this->subIndikators);

        // $this->end = array_combine($cIndex,$this->end);
        // $this->start = array_combine($cIndex,$this->start);
        // $this->evaluasi = array_combine($cIndex,$this->start);
        // $this->formEvaluasi = array_combine($cIndex,$this->formEvaluasi);
        // dd($this->formEvaluasi);

    }

    public function addIndikator($index)
    {
        $this->subIndikators[] = '';
        // $this->end["sub".$index+1] = [''];
        // $this->start["sub".$index+1] = [''];
        // $this->evaluasi["sub".$index+1] = [''];
        $this->formEvaluasi["sub".$index+1] = [''];
    }

    public function store()
    {
        // if($this->formEvaluasi[$idSub] ?? null)
        // {
        //     $this->start[$idSub][] = '';
        //     $this->end[$idSub][] = '';
        //     $this->evaluasi[$idSub][] = '';
        //     $this->formEvaluasi[$idSub][] = '';
        // }
        // else
        // {
        //     $this->start[$idSub] = [''];
        //     $this->end[$idSub] = [''];
        //     $this->evaluasi[$idSub] = [''];
        //     $this->formEvaluasi[$idSub] = [''];
        // }

        dd(['form' => $this->formEvaluasi, 'end' => $this->end, 'start' => $this->start,'evaluasi' => $this->evaluasi]);
    }
}
