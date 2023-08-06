<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($customer) {
            $customer->slug = Str::slug($customer->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }




    public function securepointutms()
    {
        return $this->hasMany(SecurepointUTM::class);
    }

    public function routers()
    {
        return $this->hasMany(Router::class);
    }

    public function securepointumas()
    {
        return $this->hasMany(SecurepointUMA::class);
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

    public function nas()
    {
        return $this->hasMany(NAS::class);
    }

    public function addomains()
    {
        return $this->hasMany(ADDomain::class);
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

    public function logingenerals()
    {
        return $this->hasMany(LoginGeneral::class);
    }

    public function loginwebsites()
    {
        return $this->hasMany(LoginWebsite::class);
    }

    public function loginnas()
    {
        return $this->hasMany(LoginNAS::class);
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

    public function printers()
    {
        return $this->hasMany(Printer::class);
    }

    public function ftpservers()
    {
        return $this->hasMany(FTPServer::class);
    }

    public function dyndns()
    {
        return $this->hasMany(DynDNS::class);
    }



}
