<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_usuario()
    {
        $data = [
            'nome' => 'Usuario Teste',
            'email' => 'teste@usuario.com',
            'cpf' => '12345678901',
            'idade' => 25,
        ];

        $response = $this->postJson('/api/usuarios', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);
    }

    public function test_update_usuario()
    {
        $usuario = Usuario::factory()->create();

        $data = [
            'nome' => 'Usuario Atualizado',
            'email' => 'atualizado@usuario.com',
            'cpf' => '10987654321',
            'idade' => 30,
        ];

        $response = $this->putJson('/api/usuarios/' . $usuario->id, $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    public function test_delete_usuario()
    {
        $usuario = Usuario::factory()->create();

        $response = $this->deleteJson('/api/usuarios/' . $usuario->id);

        $response->assertStatus(204);
    }

    public function test_list_usuarios()
    {
        Usuario::factory()->count(3)->create();

        $response = $this->getJson('/api/usuarios');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_show_usuario()
    {
        $usuario = Usuario::factory()->create();

        $response = $this->getJson('/api/usuarios/' . $usuario->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $usuario->id]);
    }
}
