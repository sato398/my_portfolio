<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;
//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class WorkCategory extends Model
{
    use HasFactory;
    use AdminBuilder;
    use ModelTree;
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['works']; //理論削除のカスケード

    protected $fillable = [
        'name',
        'name_en',
        'slug',
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('name');
    }
}
