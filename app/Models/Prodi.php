<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function campus()
    {
        return $this->belongsTo(Campus::class,'id_kampus');

    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'id_fakultas');
    }

    
}
