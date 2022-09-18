<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\WorkTool;
use App\Models\BaseToolVersion;

class WorkToolVersion extends Model
{
    use HasFactory;
    use AdminBuilder;
    use ModelTree;
    use SoftDeletes;

    protected $fillable = [
        'work_tool_id',
        'base_tool_version_id',
        'sort',
        'parent_id',
    ];

    public function workTool()
    {
        return $this->belongsTo(WorkTool::class);
    }

    public function baseToolVersion()
    {
        return $this->belongsTo(BaseToolVersion::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('work_tool_id');
    }
}
