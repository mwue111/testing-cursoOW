<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    //test_product_detail
    public function test_it_shows_the_product_details(): void
    {
        $product = Product::factory()->create();

        $this->get(route('products.show', $product))
            ->assertStatus(200)
            ->assertSee($product->name)
            ->assertSee(route('products.index'));
    }
}
