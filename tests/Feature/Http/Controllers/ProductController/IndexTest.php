<?php

namespace Tests\Feature\Http\Controllers\ProductController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;

class IndexTest extends TestCase
{
    //Como se trabajará con una base de datos de prueba, es necesario refrescarla. Por eso se importa esto:
    use RefreshDatabase;

    //test_list
    public function test_it_lists_all_items(): void
    {
        $product = Product::factory()->create();

        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee($product->name)
            ->assertSee(route('products.create'))               //Botón de crear
            ->assertSee(route('products.show', $product))       //Botón de ver producto
            ->assertSee(route('products.edit', $product))       //Botón de editar producto
            ->assertSee(route('products.destroy', $product));   //Botón de eliminar producto
    }

    //test_empty
    public function test_it_shows_an_empty_message_when_there_is_no_products(){

        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee('No hay productos registrados');
    }

    //test_paginate
    public function test_the_index_shows_the_last_product_first_and_the_first_one_as_last(){

        $first = Product::factory()->create();
        $products = Product::factory()->count(9)->create();
        $last = Product::factory()->create();

        //Muestra primero el último producto
        $this->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee($last->name);

        //Muestra en al segunda página el último producto y además muestra un botón para volver a la página 1
        $this->get(route('products.index', ['page' => 2]))
            ->assertStatus(200)
            ->assertSee($first->name)
            ->assertSee(route('products.index', ['page' => 1]));
    }
}
