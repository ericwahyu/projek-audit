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

    public function klausul(){
        return $this->belongsTo(Klausul::class);
    }

    public function pertanyaanObjektif(){
        return $this->hasMany(PertanyaanObjektif::class);
    }
}
