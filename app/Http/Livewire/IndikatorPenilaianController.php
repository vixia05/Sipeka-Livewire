<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IndikatorPenilaianController extends Component
{
    public function render()
    {
        $indikator = IndikatorPenilaian::all();
        return view('pages.indikator-penilaian',[
            'indikators' => $indikator,
        ]);
    }
}
