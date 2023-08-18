<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function pertanyaanObjektif(){
        return $this->hasMany(PertanyaanObjektif::class);
    }

    public function pertanyaanRegional(){
        return $this->hasMany(pertanyaanRegional::class);
    }


}
