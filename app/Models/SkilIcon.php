<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skil;

class SkilIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_tool_id',
        'icon',
    ];

    public function skil()
    {
        return $this->belongsTo(Skil::class);
    }
}
