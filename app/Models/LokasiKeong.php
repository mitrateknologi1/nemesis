<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitUuid;

class LokasiKeong extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'lokasi_keong';
    protected $guarded = ['id'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
