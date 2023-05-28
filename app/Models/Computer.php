<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }
}
