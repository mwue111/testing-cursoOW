<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_it_shows_the_form(): void
    {
        $this->get(route('products.create'))
            ->assertStatus(200)
            ->assertSee(route('products.store'))
            ->assertSee(route('products.index'));
    }

    public function test_it_saves_the_data() {

        //Se simulan datos de entrada
        $data = ['name' => 'Producto de prueba'];

        //Al pasarle los datos a store se hace redirección a index
        $this->post(route('products.store'), $data)
            ->assertRedirect(route('products.index'));

        //Se almacenan los datos en la BD en la tabla products
        $this->assertDatabaseHas('products', $data);

    }

    public function test_it_doesnt_saves_incorrect_data() {

        //Se simula un dato incorrecto (el nombre será obligatorio y es un campo vacío)
        $data = ['name' => ''];

        //Se recibe un dato incorrecto, se alerta del error y se redirige al formulario otra vez:
        $this->post(route('products.store'), $data)
            ->assertSessionHasErrors('name')
            ->assertStatus(302);    //302: redirección hacia el mismo formulario
    }
}
