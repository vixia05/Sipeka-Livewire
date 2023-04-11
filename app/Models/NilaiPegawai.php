<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPegawai extends Model
{
    use HasFactory;
    protected $table = "nilai_pegawai";

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
