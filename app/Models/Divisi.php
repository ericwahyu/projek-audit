<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function departemen(){
        return $this->hasMany(Departemen::class);
    }
}
