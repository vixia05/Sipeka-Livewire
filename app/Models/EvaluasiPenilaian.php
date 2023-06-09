<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiPenilaian extends Model
{
    use HasFactory;
    protected $table = "evaluasi_penilaian";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
