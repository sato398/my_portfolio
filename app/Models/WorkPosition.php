<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'base_position_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
