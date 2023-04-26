<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function penilaian(){
        return $this->hasMany(Penilaian::class);
    }
}
