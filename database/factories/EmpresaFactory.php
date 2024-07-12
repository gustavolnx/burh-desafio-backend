<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'descricao' => $this->faker->catchPhrase,
            'cnpj' => $this->faker->unique()->numerify('##############'),
            'plano' => $this->faker->randomElement(['Free', 'Premium']),
        ];
    }
}
