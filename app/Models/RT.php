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

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
