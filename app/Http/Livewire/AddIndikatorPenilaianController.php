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

    public function render()
    {
        return view('livewire.add-indikator-penilaian');
    }

    public function deleteEvaluasi($idSub)
    {
    }

    public function addEvaluasi()
    {
        dd($this->formEvaluasi['sub00']);
        $this->formEvaluasi[] = '';
    }

    public function deleteIndikator($index)
    {
        // dd(array_values($this->subIndikators));
        unset($this->subIndikators[$index]);
        $this->subIndikators = array_values($this->subIndikators);
    }

    public function addIndikator()
    {
        $this->subIndikators[] = '';
    }
}
