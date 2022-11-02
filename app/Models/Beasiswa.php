<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function campus()
    {
        return $this->belongsTo(Campus::class,'UNIV');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'FAKULTAS');
    }
}
