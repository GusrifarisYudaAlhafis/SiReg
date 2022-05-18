<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaAsc extends Model
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

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
