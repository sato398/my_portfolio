<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseTool;
use App\Models\Skil;

class BaseToolCategory extends Model
{
    use HasFactory;

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
