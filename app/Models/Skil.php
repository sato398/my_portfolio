<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SkilTool;
use App\Models\BaseToolCategory;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;
//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Skil extends Model
{
    use HasFactory;
    use ModelTree;
    use AdminBuilder;
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['items']; //理論削除のカスケード

    protected $fillable = [
        'base_tool_category_id',
        'sort',
        'parent_id',
    ];

    public function baseToolCategory()
    {
        return $this->belongsTo(BaseToolCategory::class);
    }

    public function items()
    {
        return $this->hasMany(SkilTool::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('base_tool_category_id');
    }
}
