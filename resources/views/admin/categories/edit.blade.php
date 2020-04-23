@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">

        <div class="section text-white">
            <h2 class="text-center">Editar Categoría {{ old('name',$category->name) }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">Imagen de la categoría</label>
                        <input type="file" name="image">
                        @if ($category->image)
                        <p class="font14">
                            Subir sólo si desea reemplazar la
                            <a href="{{ asset('/images/categories/'.$category->image) }}" target="_blank">imagen actual</a>
                        </p>
                        @endif
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description', $category->description) }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <select class="custom-select" name='status'>
                            @foreach ($status as $state)
                        <option value="{{$state}}"  >{{$state}}</option>
                                
                            @endforeach
                          </select> 
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary">Guardar cambios</button>&nbsp; <a href="{{ url('/admin/categories') }}" class="btn btn-warning">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <p>&nbsp;</p>

@endsection