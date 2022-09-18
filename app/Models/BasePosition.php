<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkPosition;
use Illuminate\Database\Eloquent\SoftDeletes;
//理論削除のonDeleteのライブラリ
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class BasePosition extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SoftCascadeTrait;

    /**
     * 理論削除のonDeleteのライブラリ
     *
     * @https://github.com/Askedio/laravel-soft-cascade
     */

    protected $softCascade = ['workPositions']; //理論削除のカスケード

    protected $fillable = [
        'name',
        'slug',
    ];

    public function workPositions()
    {
        return $this->hasMany(WorkPosition::class);
    }
}
