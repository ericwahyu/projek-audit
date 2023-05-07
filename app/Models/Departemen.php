<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }

    public function pertanyaanDepartemen(){
        return $this->hasMany(PertanyaanDepartemen::class);
    }
}
