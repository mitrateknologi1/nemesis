<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class LokasiRealisasiKeong extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'lokasi_realisasi_keong';
    protected $guarded = ['id'];

    public function lokasiKeong()
    {
        return $this->belongsTo(LokasiKeong::class, 'lokasi_keong_id')->withTrashed();
    }

    public function realisasiKeong()
    {
        return $this->belongsTo(RealisasiKeong::class, 'realisasi_keong_id');
    }
}
