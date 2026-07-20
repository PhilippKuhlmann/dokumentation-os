<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class LoginGeneralFactory extends Factory {
    protected $model = \App\Models\LoginGeneral::class;
    public function definition(): array {
        return [
            'name' => fake()->randomElement(['DATEV','Lexware','TeamViewer','Microsoft 365 Admin','Warenwirtschaft','Zeiterfassung']),
            'description' => fake()->randomElement(['Buchhaltung','Fernwartung','Admin-Zugang','ERP']),
            'username' => fake()->userName(),
            'password' => fake()->password(8, 14),
        ];
    }
}
