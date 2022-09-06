<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'path',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
