<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;

class PerencanaanManusia extends Model
{
    use HasFactory;

    use HasFactory, TraitUuid;

    protected $table = 'perencanaan_keong';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id');
    }

    public function opdTerkaitManusia()
    {
        return $this->hasMany(OPDTerkaitManusia::class, 'perencanaan_keong_id');
    }

    // public function lokasiPerencanaanManusia()
    // {
    //     return $this->hasMany(LokasiPerencanaanManusia::class, 'perencanaan_keong_id')->orderBy('updated_at', 'DESC');
    // }

    public function dokumenPerencanaanManusia()
    {
        return $this->hasMany(DokumenPerencanaanManusia::class, 'perencanaan_keong_id')->orderBy('no_urut');
    }

    public function realisasiManusia()
    {
        return $this->hasMany(RealisasiManusia::class, 'perencanaan_keong_id');
    }
}
