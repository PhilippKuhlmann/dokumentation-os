<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class BackupFactory extends Factory {
    protected $model = \App\Models\Backup::class;
    public function definition(): array {
        return [
            'name' => 'Backup '.fake()->word(),
            'software' => fake()->randomElement(['Veeam','Acronis','Synology Active Backup']),
            'source' => fake()->randomElement(['Server','VMs','NAS']),
            'destination' => fake()->randomElement(['NAS','Cloud','Bandlaufwerk']),
            'schedule' => fake()->randomElement(['täglich 22:00','stündlich','wöchentlich So']),
            'retention' => fake()->randomElement(['30 Tage','3 Monate','1 Jahr']),
            'last_success' => fake()->dateTimeBetween('-10 days','now')->format('Y-m-d'),
        ];
    }
}
