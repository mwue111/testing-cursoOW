<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class DestroyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_it_deletes_a_product(): void
    {
        $product = Product::factory()->create();

        //tras eliminar un producto se hace una redirección al index
        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'));

        //el producto ya no existe (como array) en la tabla products de la BD
        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
