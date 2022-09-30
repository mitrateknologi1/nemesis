<?php

namespace App\Models;

use App\Models\OPD;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerencanaanManusia extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'perencanaan_manusia';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class)->withTrashed();
    }

    public function opdTerkaitManusia()
    {
        return $this->hasMany(OPDTerkaitManusia::class);
    }

    public function dokumenPerencanaanManusia()
    {
        return $this->hasMany(DokumenPerencanaanManusia::class)->orderBy('no_urut');
    }

    public function realisasiManusia()
    {
        return $this->hasOne(RealisasiManusia::class);
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class)->withTrashed();
    }
}
