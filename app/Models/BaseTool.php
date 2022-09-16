<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkTool;
use App\Models\BaseToolCategory;
use App\Models\Skil;
use App\Models\BaseToolVersion;

use Illuminate\Database\Eloquent\SoftDeletes;

//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class BaseTool extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $softCascade = ['workTools', 'slilTools', 'baseToolVersions']; //理論削除のカスケード

    protected $fillable = [
        'name',
        'slug',
    ];

    public function slilTools()
    {
        return $this->hasMany(Skil::class);
    }

    public function baseToolVersions()
    {
        return $this->hasMany(BaseToolVersion::class);
    }

    public function baseToolCategory()
    {
        return $this->belongsTo(BaseToolCategory::class);
    }

}
