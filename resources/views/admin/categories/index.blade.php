@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')


    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section text-white">
            <h2 class="text-center">Listado de categorías</h2>
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
            <p>&nbsp;</p>
            <div class="">
                <div class="text-center">
                    <p><a href="{{ url('/admin/categories/create') }}" class="btn btn-info btn-round">Nueva categoría</a></p>
                    <div class="row table-responsive-sm">
                        <div class="col-md-12">
                        @if(count($categories)>0)
                        <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th class="text-center" width="25%">Nombre</th>
                                    <th class="text-center" width="40%">Descripción</th>
                                    <th class="text-center" width="20%">Estado visible</th>
                                    <th>Imagen</th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                               
                                <tr>
                                    <td class="text-left">{{ $category->name }}</td>
                                    <td class="text-left">{{ $category->description }}</td>
                                    <td class="text-left">{{ $category->status }}</td>
                                    <td class="text-center"><img src="{{ $category->featured_image_url }}" height="50"></td>

                                    <td class="text-center">
                                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" class="btn btn-outline-dark btn-sm" type="button" title="Editar Categoría"><i class="fa fa-edit t-blue"></i></a>
                                        <button class="btn btn-outline-dark btn-sm" type="button" title="Eliminar {{ $category->name }}" data-toggle="modal" data-target="#modalDeleteCategory{{$category->id}}"><i class="fa fa-times t-red"></i></button>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ url('/admin/categories') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                            <button class="btn btn-outline-danger" type="submit" title="Eliminar {{ $category->name }}"><i class="fa fa-times"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Delete Category -->
                                <div class="modal fade text-center" id="modalDeleteCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteCategory{{$category->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center bg-danger">
                                                <h5 class="modal-title text-white" id="modalDeleteCategory{{$category->id}}Title">Desea Eliminar la Categoría {{ $category->name }}?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>{{ $category->status}}</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{ $category->description}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>{{ ($category->status)}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ url('/admin/categories') }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-outline-danger" type="submit" title="Eliminar {{ $category->name }}"><i class="fa fa-times"></i> Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Delete Category -->

                                @endforeach
                            </tbody>
                        </table>
                        <div class="container">
                            {{ $categories->links() }}
                        </div>
                        @else
                            <h4>No hay categorias cargadas</h4>
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