<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseTool;
use App\Models\Skil;
use Illuminate\Database\Eloquent\SoftDeletes;
//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class BaseToolCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $softCascade = ['baseTools', 'skils']; //理論削除のカスケード

    protected $fillable = [
        'name',
        'slug',
        'sort',
        'parent_id',
    ];

    public function baseTools()
    {
        return $this->hasMany(BaseTool::class);
    }

    public function skils()
    {
        return $this->hasMany(Skil::class);
    }
}
