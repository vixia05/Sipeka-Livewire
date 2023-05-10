<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NilaiPegawai extends Model
{
    use HasFactory;
    protected $table = "nilai_pegawai";

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function userDetails()
    {
        return $this->hasOne(UserDetails::class,'np_user','np_user');
    }

    public function poinPegawai(): HasMany
    {
        return $this->hasMany(PoinPegawai::class,'id_nilai_pegawai','id');
    }
}
