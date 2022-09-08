<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SkilTool;

class SkilIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_tool_id',
        'icon',
    ];

    public function skilToll()
    {
        return $this->belongsTo(SkilTool::class);
    }
}
