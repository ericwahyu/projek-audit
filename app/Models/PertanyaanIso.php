<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanIso extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_iso';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function iso(){
        return $this->belongsTo(Iso::class);
    }

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class);
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class);
    }
}
