<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkTool;
use App\Models\BaseToolCategory;

class BaseTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function workTools()
    {
        return $this->hasMany(WorkTool::class);
    }

    public function baseToolCategory()
    {
        return $this->belongsTo(BaseToolCategory::class);
    }

}
