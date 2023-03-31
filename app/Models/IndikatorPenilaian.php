<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndikatorPenilaian extends Model
{
    use HasFactory;
    protected $table = "indikator_penilaian";

    /**
     * Get all of the Sub_kriteria for the KriteriaPenilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function SubIndikator(): HasMany
    {
        return $this->hasMany(SubIndikator::class,'id_indikator_penilaian','id');
    }
}
