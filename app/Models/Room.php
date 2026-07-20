<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    use \App\Models\Concerns\TracksChanges;

    protected $guarded = [];

    public function accesspoints()
    {
        return $this->hasMany(Accesspoint::class);
    }
}
