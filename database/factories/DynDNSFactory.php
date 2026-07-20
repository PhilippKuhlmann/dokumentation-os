<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class DynDNSFactory extends Factory {
    protected $model = \App\Models\DynDNS::class;
    public function definition(): array {
        return [
            'host' => fake()->domainWord(),
            'domain' => 'spdns.de',
            'providor' => fake()->randomElement(['SPDYN','No-IP','DynDNS','Strato']),
            'username' => fake()->userName(),
            'password' => fake()->password(8, 14),
        ];
    }
}
