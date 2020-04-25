@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="text-white">
            <h2 class="text-center">Listado de productos</h2>
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
            <p>&nbsp;</p>
            <div class="">
                <div class="text-center">
                    <p><a href="{{ url('/admin/products/create') }}" class="btn btn-info btn-round">Nuevo producto</a></p>
                    <div class="row table-responsive-sm">
                        <div class="col-md-12">
                        @if(count($products)>0)
                            <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th class="text-center" width="15%">Nombre</th>
                                    <th class="text-center" width="35%">Descripción</th>
                                    <th class="text-center" width="15%">Categoría</th>
                                    <th class="text-center" width="10%">Estado visible</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center" width="20%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    @php
                                        //dd($product->languages[0]->pivot->name);
                                        
                                    @endphp
                                    <td class="text-left">{{ $product->languages[0]->pivot->name }}</td>
                                    <td class="text-left">{{ $product->languages[0]->pivot->description  }}</td>
                                    <td class="text-left">{{ $product->category_name }}</td>
                                    <td class="text-left">{{ $product->status }}</td>
                                    <td class="text-right">@if($product->price>0)$@endif {{ $product->price }}</td>
                                    <td class="text-center">
                                        <a href="#modalProductDetail{{$product->id}}" class="btn btn-outline-dark btn-sm" type="button" title="Detalle de {{ $product->name }}"data-toggle="modal"  data-target="#modalProductDetail{{$product->id}}">&nbsp;<i class="fa fa-info t-yellow">&nbsp;</i></a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" class="btn btn-outline-dark btn-sm" type="button" title="Editar Producto"><i class="fa fa-edit t-blue"></i></a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/images') }}" class="btn btn-outline-dark btn-sm" type="button" title="Imágenes del Producto"><i class="fa fa-image text-success"></i></a>
                                        <button class="btn btn-outline-dark btn-sm" type="button" title="Eliminar {{ $product->name }}" data-toggle="modal" data-target="#modalDeleteProduct{{$product->id}}"><i class="fa fa-times t-red"></i></button>
                                    </td>
                                </tr>

                                <!-- Modal Delete Product -->
                                <div class="modal fade text-center" id="modalDeleteProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteProduct{{$product->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center bg-danger">
                                                <h5 class="modal-title text-white" id="modalDeleteProduct{{$product->id}}Title">Desea Eliminar el Producto {{ $product->name }}?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>{{ $product->name}}</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{ $product->description}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="t-blue">@if($product->price>0)$@endif{{ $product->price}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="{{ url('/admin/products') }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-outline-danger" type="submit" title="Eliminar {{ $product->name }}"><i class="fa fa-times"></i> Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Delete Product -->

                                <!-- Modal Product Detail -->
                                <div class="modal fade t-black text-center" id="modalProductDetail{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalProductDetail{{$product->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="modalProductDetail{{$product->id}}Title">Detalle de {{ $product->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>{{ $product->name}}</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{ $product->description}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="t-blue">@if($product->price>0)$@endif{{ $product->price}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Product Detal -->

                                @endforeach
                            </tbody>
                        </table>
                    <div class="container">
                        {{ $products->links() }}
                    </div>
                        @else
                            <h4>No hay productos cargados</h4>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
 </div>
        <p>&nbsp;</p>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
        });
    </script>
@endsection