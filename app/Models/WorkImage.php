<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use Illuminate\Database\Eloquent\SoftDeletes;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class WorkImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AdminBuilder;
    use ModelTree;

    protected $fillable = [
        'work_id',
        'path',
        'type',
        'sort',
        'parent_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('path');
    }
}
