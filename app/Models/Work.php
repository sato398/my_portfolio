<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkCategory;
use App\Models\WorkPosition;
use App\Models\WorkTool;
use App\Models\WorkImage;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Work extends Model
{
    use HasFactory, ModelTree, AdminBuilder;

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
        return $this->hasMany(WorkTool::class);
    }

    public function workPositions()
    {
        return $this->hasMany(WorkPosition::class);
    }


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('title');
    }
}
