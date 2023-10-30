<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RackCabinet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function devices()
    {
        return $this->belongsToMany(RackDevice::class, 'rack_cabinet_rack_device')->withPivot('position', 'filled_id');
    }
}
