@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section text-white">
            <h2 class="text-center">Registrar Nuevo Producto</h2>
            <p>&nbsp;</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/products') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="control-label">Categoría del producto</label>
                            <select class="form-control" name="category_id">
                                <option value="0">General</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label">Precio del producto</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                         <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>
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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old('long_description') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <button class="btn btn-primary">Registrar producto</button>&nbsp;<a href="{{ url('/admin/products') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </div>
                </div>

            </form>
            <p>&nbsp;</p>
        </div>

    </div>
    <p>&nbsp;</p>

@endsection