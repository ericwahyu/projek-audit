<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanRegional extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_regional';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class);
    }

    public function regional(){
        return $this->belongsTo(Regional::class);
    }
}
