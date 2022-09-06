<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkCategory;
use App\Models\WorkPosition;
use App\Models\WorkTool;
use App\Models\WorkImage;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'work_category_id',
        'explanation',
    ];

    public function category()
    {
        return $this->belongsTo(WorkCategory::class);
    }

    public function images()
    {
        return $this->hasMany(WorkImage::class);
    }

    public function tools()
    {
        return $this->hasMany(WorkTool::class);
    }

    public function positions()
    {
        return $this->hasMany(WorkPosition::class);
    }
}
