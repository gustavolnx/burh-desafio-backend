<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Vaga;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VagaTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_vaga()
    {
        $empresa = Empresa::factory()->create();

        $data = [
            'empresa_id' => $empresa->id,
            'titulo' => 'Vaga Teste',
            'descricao' => 'Descrição Teste',
            'tipo_vaga' => 'PJ',
            'salario' => 1500.00,
        ];

        $response = $this->postJson('/api/vagas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);
    }

    public function test_update_vaga()
    {
        $empresa = Empresa::factory()->create();
        $vaga = Vaga::factory()->create(['empresa_id' => $empresa->id, 'tipo_vaga' => 'Estágio']);

        $data = [
            'titulo' => 'Vaga Atualizada',
            'descricao' => 'Descrição Atualizada',
            'tipo_vaga' => 'Estágio',
            'salario' => 1212.00,
            'horario' => 6,
        ];

        $response = $this->putJson('/api/vagas/' . $vaga->id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    public function test_delete_vaga()
    {
        $vaga = Vaga::factory()->create();

        $response = $this->deleteJson('/api/vagas/' . $vaga->id);

        $response->assertStatus(204);
    }

    public function test_list_vagas()
    {
        Vaga::factory()->count(3)->create();

        $response = $this->getJson('/api/vagas');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_show_vaga()
    {
        $vaga = Vaga::factory()->create();

        $response = $this->getJson('/api/vagas/' . $vaga->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $vaga->id]);
    }
}
