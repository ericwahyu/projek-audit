<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function unitSub(){
        return $this->belongsTo(UnitSub::class);
    }

    public function nilai(){
        return $this->belongsTo(Nilai::class);
    }
}
