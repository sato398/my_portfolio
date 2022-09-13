<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skil;
use App\Models\BaseTool;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class SkilTool extends Model
{
    use HasFactory, ModelTree, AdminBuilder;

    protected $fillable = [
        'skil_id',
        'base_tool_id',
        'years_of_dev',
        'icon',
        'sort',
        'parent_id',
    ];

    public function skil()
    {
        return $this->belongsTo(Skil::class);
    }

    public function tool()
    {
        return $this->belongsTo(BaseTool::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('base_tool_id');
    }
}
