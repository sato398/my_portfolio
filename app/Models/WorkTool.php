<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use App\Models\BaseTool;

class WorkTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'base_tool_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function tool()
    {
        return $this->belongsTo(BaseTool::class);
    }
}
