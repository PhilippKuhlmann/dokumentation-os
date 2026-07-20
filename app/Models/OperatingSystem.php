<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatingSystem extends Model
{
    use HasFactory, SoftDeletes;
    use \App\Models\Concerns\TracksChanges;

    protected $guarded = [];

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

}
