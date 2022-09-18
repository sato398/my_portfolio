<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasePositionWork extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'work_id',
        'base_position_id',
    ];
}
