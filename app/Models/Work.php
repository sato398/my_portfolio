<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkCategory;
use App\Models\WorkPosition;
use App\Models\WorkTool;
use App\Models\BaseTool;
use App\Models\WorkToolVersion;
use App\Models\WorkImage;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;
//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Work extends Model
{
    use HasFactory;
    use ModelTree;
    use AdminBuilder;
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['workImages', 'workTools', 'workPositions']; //理論削除のカスケード

    protected $fillable = [
        'title',
        'slug',
        'work_category_id',
        'explanation',
        'sort',
        'parent_id',
    ];

    public function workCategory()
    {
        return $this->belongsTo(WorkCategory::class);
    }

    public function workImages()
    {
        return $this->hasMany(WorkImage::class);
    }

    public function workTools()
    {
        // return $this->hasManyThrough(
        //     WorkToolVersion::class,
        //     WorkTool::class,
        //     'work_id',
        //     'work_tool_id',
        //     'id',
        //     'id'
        // );
        return $this->hasMany(WorkTool::class);
    }

    public function baseTools()
    {
        return $this->belongsToMany(BaseTool::class);
    }

    public function basePositions()
    {
        return $this->belongsToMany(BasePosition::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('title');
    }
}
