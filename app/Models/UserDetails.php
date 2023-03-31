<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the divisi that owns the UserDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class)->withDefault();
    }

    /**
     * Get the seksi that owns the UserDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seksi(): BelongsTo
    {
        return $this->belongsTo(Seksi::class)->withDefault();
    }


    /**
     * Get the Unit that owns the UserDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class)->withDefault();
    }

    /**
     * Get the seksi that owns the UserDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class)->withDefault();
    }

}
