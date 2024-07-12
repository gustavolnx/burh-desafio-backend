<?php

namespace Database\Factories;

use App\Models\Vaga;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class VagaFactory extends Factory
{
    protected $model = Vaga::class;

    public function definition()
    {
        return [
            'empresa_id' => Empresa::factory(),
            'titulo' => $this->faker->jobTitle,
            'descricao' => $this->faker->sentence,
            'tipo_vaga' => $this->faker->randomElement(['PJ', 'CLT', 'Estágio']),
            'salario' => $this->faker->numberBetween(1212, 5000),
            'horario' => $this->faker->numberBetween(4, 8),
        ];
    }
}
