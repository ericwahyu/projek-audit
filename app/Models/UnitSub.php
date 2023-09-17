<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitSub extends Model
{
    use HasFactory;
    protected $table = 'unit_sub';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function regional(){
        return $this->belongsTo(Regional::class);
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class);
    }

    public function pertanyaanUnitSub(){
        return $this->hasMany(PertanyaanUnitSub::class);
    }

    public function buktiAudit(){
        return $this->hasMany(BuktiAudit::class);
    }
}
