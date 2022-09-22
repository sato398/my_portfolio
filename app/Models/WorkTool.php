<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use App\Models\BaseTool;
use App\Models\BaseToolVersion;
use App\Models\WorkToolVersion;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkTool extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'work_id',
        'base_tool_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function baseTool()
    {
        return $this->belongsTo(BaseTool::class);
    }

    public function baseToolVersions()
    {
        return $this->hasMany(BaseToolVersion::class);
    }

    public function workToolVersions()
    {
        return $this->hasMany(WorkToolVersion::class);
    }
}
