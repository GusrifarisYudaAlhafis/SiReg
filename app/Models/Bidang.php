<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    public function informasi()
    {
        return $this->hasMany(Informasi::class);
    }

    public function umum()
    {
        return $this->hasMany(AnggotaUmum::class);
    }

    public function asc()
    {
        return $this->hasMany(AnggotaAsc::class);
    }
}
