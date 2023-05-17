<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;
use App\Models\SubIndikator;
use App\Models\EvaluasiPenilaian;

class AddIndikatorPenilaianController extends Component
{
    public $maxPoin = [];
    public $evaluasi = [''];
    public $formEvaluasi = [''];
    public $subIndikators = [''];
    public $start = [''];
    public $end = [''];

    public $saved = false;

    public function mount()
    {
        $this->end["sub0"] = [''];
        $this->start["sub0"] = [''];
        $this->formEvaluasi["sub0"] = [''];
    }

    public function render()
    {
        // dd($this->formEvaluasi);
        return view('livewire.add-indikator-penilaian');
    }

    public function deleteEvaluasi($idSub, $index)
    {
        dd($this->end);
        if($this->formEvaluasi[$idSub] ?? null)
        {
            unset($this->end[$idSub."-".$index]);
            unset($this->start[$idSub."-".$index]);
            unset($this->formEvaluasi[$idSub][$index]);

            // $this->end = array_values($this->end);
            // $this->start = array_values($this->start);
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
            $this->start[$idSub][] = '';
            $this->end[$idSub][] = '';
            $this->formEvaluasi[$idSub][] = '';
        }
        else
        {
            $this->start[$idSub] = [''];
            $this->end[$idSub] = [''];
            $this->formEvaluasi[$idSub] = [''];
        }
        // dd($this->formEvaluasi);
    }

    public function deleteIndikator($index)
    {
        // dd(array_values($this->subIndikators));
        unset($this->maxPoin[$index]);
        unset($this->end["sub".$index]);
        unset($this->start["sub".$index]);
        unset($this->subIndikators[$index]);
        $this->maxPoin = array_values($this->maxPoin);
        $this->subIndikators = array_values($this->subIndikators);
    }

    public function addIndikator($index)
    {
        $this->subIndikators[] = '';
        $this->end["sub".$index+1] = [''];
        $this->start["sub".$index+1] = [''];
        $this->formEvaluasi["sub".$index+1] = [''];
    }
}
