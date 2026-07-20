<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Crypt;
class Backup extends Model {
    use HasFactory, SoftDeletes;
    use \App\Models\Concerns\TracksChanges;
    protected $guarded = [];
    protected function password(): Attribute {
        return new Attribute(
            get: fn ($value) => !empty($value) ? Crypt::decryptString($value) : null,
            set: fn ($value) => !empty($value) ? Crypt::encryptString($value) : null,
        );
    }
    public function customer() { return $this->belongsTo(Customer::class); }
}
