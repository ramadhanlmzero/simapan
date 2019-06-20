<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $fillable = [
        'no_rw', 'nama_rw', 'id_kelurahan'
    ];
    public $timestamps = false;

    /**
     * RW belongs to Village.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village()
    {
        return $this->belongsTo(Village::class, 'id_kelurahan', 'id')->with('district');
    }

    /**
     * RW has many RT.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rt()
    {
        return $this->hasMany(RT::class, 'id_rw', 'id_rw');
    }
}