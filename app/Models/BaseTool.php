<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkTool;
use App\Models\BaseToolCategory;
use App\Models\Skil;

class BaseTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function workTool()
    {
        return $this->belongsTo(WorkTool::class);
    }

    public function slilTool()
    {
        return $this->hasMany(Skil::class);
    }

    public function baseToolCategory()
    {
        return $this->belongsTo(BaseToolCategory::class);
    }

}
