<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

//se trabajará con un producto que ya exista:
use App\Models\Product;

class EditTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_it_shows_the_edit_form_with_an_existing_product(): void
    {
        //se crea un producto
        $product = Product::factory()->create();

        //el formulario mostrará un registro de la base de datos:
        $this->get(route('products.edit', $product))
            ->assertStatus(200)
            ->assertSee($product->name)
            ->assertSee(route('products.update', $product));    //ruta de edición del producto
    }

    public function test_it_updates_a_product() {

        $product = Product::factory()->create();
        $data = ['name' => 'nuevo nombre'];

        //Envía a la ruta del producto los datos nuevos
        $this->put(route('products.update', $product), $data)   //verbo PUT
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', $data);
    }

    public function test_it_doesnt_updates_incorrect_data() {

        $product = Product::factory()->create();
        $data = ['name' => null];

        $this->put(route('products.update', $product), $data)   //verbo PUT
            ->assertSessionHasErrors('name')
            ->assertStatus(302);
    }

}
