<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RackDevice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cabinets()
    {
        return $this->belongsToMany(RackCabinet::class, 'rack_cabinet_rack_device')
                    ->withTimestamps()
                    ->withPivot(['position', 'filled_id']);
    }
}
