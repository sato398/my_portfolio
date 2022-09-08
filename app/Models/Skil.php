<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseTool;

class Skil extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_tool_id',
        'years_of_dev',
    ];

    public function baseTools()
    {
        return $this->hasMany(BaseTool::class);
    }
}
