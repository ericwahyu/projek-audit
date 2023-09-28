<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objektif extends Model
{
    use HasFactory;
    protected $table = 'objektif';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function objektifKlausul(){
        return $this->hasMany(ObjektifKlausul::class);
    }

    public function pertanyaanObjektif(){
        return $this->hasMany(PertanyaanObjektif::class);
    }
}
