@extends('layouts.app')

@section('title', 'Imágenes de productos')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section text-white">
            <h2 class="text-center">Imágenes del Producto {{ $product->name }}</h2>
            <p>&nbsp;</p>
            <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="photo" required>
                <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>&nbsp; <a href="{{ url('/admin/products') }}" class="btn btn-warning btn-round">Volver al listado de productos</a>
            </form>

            <hr class="text-white">

            <div class="row d-flex justify-content-center">
            @foreach ($images as $image)
                <div class="card text-center m-1">
                    <img src="{{ $image->url }}" width="250" class="m-1">
                    <div class="card-body">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <button type="submit" class="btn btn-danger">Eliminar imagen</button>
                            @if ($image->featured)
                                <button type="button" class="btn btn-info" rel="tooltip" title="Imagen destacada actualmente">
                                    <i class="fa fa-heart text-red"></i>
                                </button>
                            @else
                                <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary">
                                    <i class="fa fa-heart text-red"></i>
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
    </div>
    <p>&nbsp;</p>
@endsection