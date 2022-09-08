<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skil;

class SkilCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function skils()
    {
        return $this->hasMany(Skil::class);
    }
}
