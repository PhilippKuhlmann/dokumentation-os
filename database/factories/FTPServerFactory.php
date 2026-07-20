<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class FTPServerFactory extends Factory {
    protected $model = \App\Models\FTPServer::class;
    public function definition(): array {
        return [
            'host' => 'ftp.' . fake()->domainName(),
            'description' => fake()->randomElement(['Datenaustausch Steuerberater','Backup extern','Lieferanten-Upload','Webseiten-Deploy']),
            'username' => fake()->userName(),
            'password' => fake()->password(8, 14),
        ];
    }
}
