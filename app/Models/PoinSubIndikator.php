<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoinSubIndikator extends Model
{
    use HasFactory;
    protected $table = "poin_sub_indikator";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
