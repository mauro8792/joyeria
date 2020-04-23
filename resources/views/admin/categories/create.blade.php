@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">

        <div class="section text-white">
            <h2 class="text-center">Registrar Nueva Categoría</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <input type="hidden" name="status" value="users">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">Imagen de la categoría</label>
                        <input type="file" name="image">
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary">Registrar categoría</button>&nbsp;<a href="{{ url('/admin/categories') }}" class="btn btn-warning">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <p>&nbsp;</p>
@endsection