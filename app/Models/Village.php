<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

/**
 * Village Model.
 */
class Village extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'indoregion_villages';
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'district_id'
    ];
	
	/**
     * Village belongs to District.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id')->with('regency');
    }

    /**
     * Village has many RW.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rw()
    {
        return $this->hasMany(RW::class, 'id_kelurahan', 'id');
    }
}
