<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseTool;

class BaseToolCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function baseTools()
    {
        return $this->hasMany(BaseTool::class);
    }
}
