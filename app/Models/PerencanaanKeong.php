<?php

namespace App\Models;

use App\Models\OPD;
use App\Traits\TraitUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerencanaanKeong extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'perencanaan_keong';
    protected $guarded = ['id'];

    public function opd()
    {
        return $this->belongsTo(OPD::class, 'opd_id');
    }
}
