<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class RadiocenterFactory extends Factory {
    protected $model = \App\Models\Radiocenter::class;
    public function definition(): array {
        return [
            'frequency' => fake()->randomElement(['448.5625 MHz','449.0125 MHz','168.250 MHz']),
            'channel_spacing' => '12,5 kHz',
            'power' => fake()->randomElement(['1 W','5 W','10 W']),
            'evaluator' => 'ZVEI',
            'encoder' => 'ZVEI',
            'receipt' => 'Ja',
            'pilot_tone' => '2400 Hz',
            'transmission_type' => 'Analog FM',
        ];
    }
}
