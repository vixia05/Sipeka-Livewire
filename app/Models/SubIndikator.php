<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubIndikator extends Model
{
    use HasFactory;
    protected $table = "sub_indikator";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get all of the Sub_kriteria for the KriteriaPenilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluasi(): HasMany
    {
        return $this->hasMany(EvaluasiPenilaian::class,'id_sub_indikator','id');
    }
}
