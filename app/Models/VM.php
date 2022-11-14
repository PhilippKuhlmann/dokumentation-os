<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServerOperatingSystem;

class VM extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'services' => 'array'
    ];

    public function serverOperatingSystem()
    {
        return $this->belongsTo(ServerOperatingSystem::class);
    }

}
