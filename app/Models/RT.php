<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $fillable = [
        'no_rt', 'nama_rt', 'id_rw'
    ];
    public $timestamps = false;

    /**
     * RT belongs to RW.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rw()
    {
        return $this->belongsTo(RW::class);
    }

    /**
     * RT has many Penduduk.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
