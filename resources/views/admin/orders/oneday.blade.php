@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')


    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section">
            <h2 class="text-white text-center">Ventas del día {{ $day }}</h2>
            @include('includes.formCarts')

            <div class="accordion" id="accordionTakeAway">
                @php
                    $id = -1;
                    $total = 0;
                    $totalToday = 0;
                    $flag = 0;

                @endphp
                @foreach ($carts as $key=>$cart)
                    @if(($cart->cart_id != $id) && (!$loop->first))
                            </tbody>
                            </table>
                            </div>
                                <div class="card-footer bg-secondary text-white">
                                    ----------------------------------- Total a Pagar: ${{ $total }}
                                </div>
                            </div>
                        </div>
                            @php $totalToday+=$total; @endphp
                            @php $total=0; @endphp
                    @endif

                    @if(($cart->cart_id != $id)||($loop->first))
                        <div class="d-none">{{ $id = $cart->cart_id }}</div>
                            <div class="card">
                                <div class="card-header" id="heading{{$cart->cart_id}}">
                                    <h2 class="mb-0 bg-info">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <button class="btn btn-link t-white-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$cart->cart_id}}" aria-expanded="true" aria-controls="collapse{{$cart->cart_id}}">
                                                    Cliente: {{ $cart->cliente }}  | Fecha: {{ $cart->created_at }}
                                                </button>
                                            </div>
                                                <div class="col-sm-2 mr-auto">
                                                @if($cart->status === "Active")
                                                    <a href="#" class="btn btn-sm btn-outline-light disabled" role="button" aria-disabled="true">{{$cart->status}}</a>
                                                @elseif($cart->status === "Finalizado")
                                                    <a href="#" class="btn btn-sm btn-outline-light disabled" role="button" aria-disabled="true">{{$cart->status}}</a>
                                                @else
                                                    <a href="#" class="btn btn-sm btn-outline-light disabled" role="button" aria-disabled="true">{{$cart->status}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </h2>
                                </div>
                                <div id="collapse{{$cart->cart_id}}" class="collapse" aria-labelledby="heading{{$cart->cart_id}}" data-parent="#accordionTakeAway">
                                    <div class="card-body">

                                        <table class="table text-black">
                                            <thead>
                                            <tr>
                                                <th>Cantidad</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>SubTotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                    @endif
                                    <div class="d-none">{{ $total = $total + ($cart->quantity * $cart->price) }}</div>
                                        <tr>
                                            <td>{{$cart->quantity}}</td>
                                            <td>{{$cart->name}}</td>
                                            <td>${{$cart->price}}</td>
                                            <td>${{ $cart->quantity * $cart->price }}</td>
                                        </tr>
                                     @if($loop->last)
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="card-footer bg-secondary text-white">
                                            ----------------------------------- Total a Pagar: ${{ $total }}
                                        </div>
                                    </div>
                                </div>
                                    @php $totalToday+=$total; @endphp
                                    @php $total=0; @endphp
                                @endif
                    @endforeach
                    <div class="">
                        <p></p>
                        <h4 class="text-white">Total de ventas del día {{ $day }}: ${{ $totalToday }}</h4>
                    </div>
            </div>
       </div>
    </div>
    <p>&nbsp;</p>
@endsection

@section('scripts')
    <script>
        function getDate(){
            var today = new Date();
            document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
        }
    </script>
@endsection