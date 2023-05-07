<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanDepartemen extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_departemen';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function departemen(){
        return $this->belongsTo(Departemen::class);
    }

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class);
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class);
    }

}
