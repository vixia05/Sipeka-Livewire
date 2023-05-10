<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoinPegawai extends Model
{
    use HasFactory;
    protected $table = "poin_pegawai";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
