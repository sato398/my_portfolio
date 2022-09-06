<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
