<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class MachineFactory extends Factory {
    protected $model = \App\Models\Machine::class;
    public function definition(): array {
        return [
            'name' => fake()->randomElement(['CNC-Fräse Halle 1','Laserschneider','Verpackungsanlage','Etikettendrucker Produktion','Waage Warenausgang']),
            'ip' => fake()->localIpv4(),
        ];
    }
}
