<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxProvider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mailboxes()
    {
        return $this->hasMany(Mailbox::class);
    }
}
