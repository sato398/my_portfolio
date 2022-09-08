<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SkilTool;
use App\Models\SkilCategory;

class Skil extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'skil_category_id',
        'explanation',
        'sort',
        'parent_id',
    ];

    public function category()
    {
        return $this->belongsTo(SkilCategory::class);
    }

    public function tools()
    {
        return $this->hasMany(SkilTool::class);
    }
}
