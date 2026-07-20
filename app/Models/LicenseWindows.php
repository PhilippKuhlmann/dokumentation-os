<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LicenseWindows extends Model
{
    use HasFactory, SoftDeletes;
    use \App\Models\Concerns\TracksChanges;

    protected $guarded = [];

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
