<?php

namespace App\Models;

use GuzzleHttp\Client;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'role_id',
        'customer_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://visitenkarte.stadel.info/api/employee?email='. Auth()->user()->email);

        $data = json_decode($response->getBody(), true);

        $data = "https://visitenkarte.stadel.info/storage/" . $data[0]['picture'];

        return $data;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
