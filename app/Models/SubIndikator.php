<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubIndikator extends Model
{
    use HasFactory;
    protected $table = "sub_indikator";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
