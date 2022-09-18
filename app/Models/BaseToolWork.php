<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use App\Models\BaseTool;
use App\Models\BaseToolVersion;
use App\Models\WorkToolVersion;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseToolWork extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'work_id',
        'base_tool_id',
    ];

    public function baseToolVersions()
    {
        return $this->hasMany(BaseToolVersion::class);
    }

    public function workToolVersions()
    {
        return $this->hasMany(WorkToolVersion::class);
    }
}
