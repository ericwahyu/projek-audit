<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klausul extends Model
{
    use HasFactory;
    protected $table = 'klausul';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function objektif(){
        return $this->hasMany(Objektif::class);
    }

    public function iso(){
        return $this->belongsTo(Iso::class);
    }
}
