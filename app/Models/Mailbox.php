<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mailbox extends Model
{
    use HasFactory, SoftDeletes;
    use \App\Models\Concerns\TracksChanges;

    protected $guarded = [];

    public function mailboxProvider()
    {
        return $this->belongsTo(MailboxProvider::class);
    }
}
