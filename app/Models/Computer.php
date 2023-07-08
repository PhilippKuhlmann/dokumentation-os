<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Computer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    protected function remotePassword(): Attribute
    {
        return new Attribute(
            get: fn ($value) => !empty($value) ? Crypt::decryptString($value) : null,
            set: fn ($value) => Crypt::encryptString($value),
        );
    }
}
