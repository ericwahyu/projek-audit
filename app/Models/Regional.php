<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;
    protected $table = 'regional';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function unitSub(){
        return $this->hasMany(unitSub::class);
    }

    public function divisi(){
        return $this->hasMany(Divisi::class);
    }
}
