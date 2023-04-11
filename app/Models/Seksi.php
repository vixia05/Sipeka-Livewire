<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    use HasFactory;
    protected $table = "seksi";
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
