<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'desa';
    protected $appends = ['koordinatPolygon'];

    public function getKoordinatPolygonAttribute()
    {
        return json_decode($this->polygon);
    }
}
