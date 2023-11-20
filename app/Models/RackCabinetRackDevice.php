<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RackCabinetRackDevice extends Pivot
{
    use HasFactory;

    protected $guarded = [];
}
