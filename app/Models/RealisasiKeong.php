<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;


class RealisasiKeong extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'realisasi_keong';
    protected $guarded = ['id'];
}
