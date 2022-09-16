<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkPosition extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'work_id',
        'base_position_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
