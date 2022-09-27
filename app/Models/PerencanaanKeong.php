<?php

namespace App\Models;

use App\Models\OPD;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerencanaanKeong extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'perencanaan_keong';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id')->withTrashed();
    }

    public function opdTerkaitKeong()
    {
        return $this->hasMany(OPDTerkaitKeong::class, 'perencanaan_keong_id');
    }

    public function lokasiRealisasiKeong()
    {
        return $this->hasMany(LokasiRealisasiKeong::class, 'realisasi_keong_id')->orderBy('updated_at', 'DESC');
    }

    public function dokumenPerencanaanKeong()
    {
        return $this->hasMany(DokumenPerencanaanKeong::class, 'perencanaan_keong_id')->orderBy('no_urut');
    }

    public function realisasiKeong()
    {
        return $this->hasOne(RealisasiKeong::class);
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class)->withTrashed();
    }
}
