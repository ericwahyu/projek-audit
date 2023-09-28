<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjektifKlausul extends Model
{
    use HasFactory;
    protected $table = 'objektif_klausul';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function objektif(){
        return $this->belongsTo(Objektif::class);
    }

    public function klausul(){
        return $this->belongsTo(Klausul::class);
    }
}

