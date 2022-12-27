<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Server extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected function bmcPassword(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Crypt::decryptString($value),
            set: fn ($value) => Crypt::encryptString($value),
        );
    }

    protected function services(): Attribute
    {
        return new Attribute(
            get: fn ($value) => explode(',', $value),
        );
    }

    public function serverOperatingSystem()
    {
        return $this->belongsTo(ServerOperatingSystem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
