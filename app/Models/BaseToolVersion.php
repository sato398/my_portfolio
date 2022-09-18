<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseTool;
use App\Models\WorkToolVersion;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class BaseToolVersion extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AdminBuilder;
    use ModelTree;

    protected $fillable = [
        'base_tool_id',
        'version',
    ];

    public function baseTool()
    {
        return $this->belongsTo(BaseTool::class);
    }

    public function workToolVersions()
    {
        return $this->hasMany(WorkToolVersion::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('version');
    }
}
