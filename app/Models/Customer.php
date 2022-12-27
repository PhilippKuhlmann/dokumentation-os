<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function networks()
    {
        return $this->hasMany(Network::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function vms()
    {
        return $this->hasMany(VM::class);
    }

    public function adusers()
    {
        return $this->hasMany(ADUser::class);
    }

    public function adgroups()
    {
        return $this->hasMany(ADGroup::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function loginwebsites()
    {
        return $this->hasMany(LoginWebsite::class);
    }

    public function phonesystems()
    {
        return $this->hasMany(PhoneSystem::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function mailboxes()
    {
        return $this->hasMany(Mailbox::class);
    }

    public function wifis()
    {
        return $this->hasMany(Wifi::class);
    }

    public function computers()
    {
        return $this->hasMany(Computer::class);
    }



}
