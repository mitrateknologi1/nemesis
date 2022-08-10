<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TraitUuid;

class LokasiPerencanaanKeong extends Model
{
    use HasFactory, TraitUuid, SoftDeletes;

    protected $table = 'lokasi_perencanaan_keong';
    protected $guarded = ['id'];
}
