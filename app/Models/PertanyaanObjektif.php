<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanObjektif extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_objektif';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class);
    }

    public function objektif(){
        return $this->belongsTo(Objektif::class);
    }
}
