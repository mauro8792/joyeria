@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="text-white">
            <h2 class="text-center">Listado de Usuarios</h2>
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
            <p>&nbsp;</p>
            <div class="">
                <div class="text-center">
                    <p><a href="{{ url('/admin/users/create') }}" class="btn btn-info btn-round">Nuevo Usuario</a></p>
                    <div class="row table-responsive-sm">
                        <div class="col-md-12">
                        @if(count($users)>0)
                            <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th class="text-center" width="35%">Nombre</th>
                                    <th class="text-center" width="30%">E-Mail</th>
                                    <th class="text-center" width="15%">Telefono</th>
                                    <th class="text-center" width="15%">Estado</th>                                    
                                    <th class="text-center" width="15%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-left">{{ $user->lastName }}, {{ $user->name }}</td>
                                    <td class="text-left">{{ $user->email }}</td>
                                    <td class="text-left">{{ $user->telephone }}</td>
                                    <td class="text-left">
                                        <form method="post" action="{{ route('changeStatus') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button class="btn btn-outline-dark btn-sm" type="submit" ><i class="fa fa-times t-red"></i>{{ $user->status == 0 ? ' Pendiente' : ' Activo' }}</button>
                                        </form>
                                        
                                    </td>
                                    <td class="text-center">
                                        <form method="post" action="{{ url('/admin/users') }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <a href="#modalUserDetail{{$user->id}}" class="btn btn-outline-dark btn-sm" type="button" title="Detalle de {{ $user->name }}"data-toggle="modal"  data-target="#modalUserDetail{{$user->id}}">&nbsp;<i class="fa fa-info t-yellow">&nbsp;</i></a>
                                            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-outline-dark btn-sm" type="button" title="Editar Usuario"><i class="fa fa-edit t-blue"></i></a>
                                            <button class="btn btn-outline-dark btn-sm" type="submit" title="Eliminar Usuario"><i class="fa fa-times t-red"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade t-black text-center" id="modalUserDetail{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalUserDetail{{$user->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="modalUserDetail{{$user->id}}Title">Detalle de {{ $user->lastName }}, {{ $user->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>{{ $user->lastName }}, {{ $user->name}}</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>E-Mail: {{ $user->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2>Teléfono: {{ $user->telephone}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Modal -->

                                @endforeach
                            </tbody>
                        </table>
                    <div class="container">
                        {{ $users->links() }}
                    </div>
                        @else
                            <h4>No hay usuarios cargados</h4>
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