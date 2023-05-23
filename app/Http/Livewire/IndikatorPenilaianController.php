<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndikatorPenilaian;

class IndikatorPenilaianController extends Component
{
    public function render()
    {
        $indikator = IndikatorPenilaian::all();
        return view('pages.indikator-penilaian.main',[
            'indikators' => $indikator,
        ]);
    }

    public function show($id)
    {
        return view('pages.indikator-penilaian.detail',[
            'indikator' => IndikatorPenilaian::where('id',$id)->first(),
        ]);
    }

    public function destroy()
    {

    }
}
