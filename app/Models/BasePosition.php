<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkPosition;
use Illuminate\Database\Eloquent\SoftDeletes;
//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class BasePosition extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, AdminBuilder, ModelTree;

    /**
     * 理論削除のonDeleteのライブラリ
     *
     * @https://github.com/Askedio/laravel-soft-cascade
     */

    protected $softCascade = ['workPositions']; //理論削除のカスケード

    protected $fillable = [
        'name',
        'slug',
        'sort',
        'parent_id',
    ];

    public function workPositions()
    {
        return $this->hasMany(WorkPosition::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('version');
    }
}
