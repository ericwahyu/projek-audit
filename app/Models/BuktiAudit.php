<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiAudit extends Model
{
    use HasFactory;
    protected $table = 'bukti_audit';
    protected $primarykey = 'id';
    protected $fillable = [];

    public function unitSub(){
        return $this->belongsTo(UnitSub::class);
    }
}
