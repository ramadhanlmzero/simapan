<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = 'rt';
    protected $primaryKey = 'no_rt';
    protected $fillable = [
        'no_rt', 'nama_rt', 'no_rw', 'kelurahan', 'kecamatan', 'kota'
    ];
    public $timestamps = false;

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
