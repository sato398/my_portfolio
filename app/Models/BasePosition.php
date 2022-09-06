<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkPosition;

class BasePosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function workPositions()
    {
        return $this->hasMany(WorkPosition::class);
    }
}
