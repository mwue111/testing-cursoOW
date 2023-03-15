@extends('app')

@section('content')
<h3 class="text-xl">{{$product->name}}</h3>
<div class="p-2">
    <p class="m-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quibusdam ab repellendus accusantium excepturi repellat. Fuga facere ea perferendis blanditiis dolore deserunt. Illum minus, odio laborum est magnam provident vero?
    Expedita magnam, laudantium dolorem eaque aperiam distinctio quasi! Maxime praesentium facere, laudantium eum pariatur consequuntur ut modi error odio ad? Numquam vel a inventore assumenda harum molestiae voluptatem minima explicabo.</p>
    <p class="m-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, repellendus. Provident neque asperiores consequatur. Alias nostrum, nisi, quos voluptate quisquam soluta rem, omnis in dolor voluptas velit quibusdam. Numquam, laborum?</p>
</div>
<a href="{{ route('products.index') }}" class="text-blue-600">Volver</a>
@endsection
