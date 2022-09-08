<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skil;
use App\Models\BaseTool;

class SkilTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'skil_id',
        'base_tool_id',
        'years_of_dev',
        'icon',
    ];

    public function skil()
    {
        return $this->belongsTo(Skil::class);
    }

    public function tools()
    {
        return $this->hasMany(BaseTool::class);
    }
}
