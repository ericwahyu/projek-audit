<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iso extends Model
{
    use HasFactory;
    protected $table = 'iso';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function pertanyaanIso(){
        return $this->hasMany(PertanyaanIso::class);
    }

    public function Klausul(){
        return $this->hasMany(Klausul::class);
    }
}
