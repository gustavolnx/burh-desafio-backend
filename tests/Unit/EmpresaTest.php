<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_empresa()
    {
        $data = [
            'nome' => 'Empresa Teste',
            'descricao' => 'Descrição Teste',
            'cnpj' => '12345678000100',
            'plano' => 'Free',
        ];

        $response = $this->postJson('/api/empresas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);
    }
}
