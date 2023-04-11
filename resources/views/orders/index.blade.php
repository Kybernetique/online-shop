@extends('layouts.app')
@section('content')
    <div class="text-center"><h1>Мои заказы</h1></div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Номер заказа</th>
                    <th scope="col">Название товара</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Итого</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @foreach($order->products()->get() as $key => $product)
                        <tr>
                            @if($key === 0)
                                <th>{{$order->id}}</th>
                            @else
                                <th></th>
                            @endif
                            <td>{{$product->name}}</td>
                            <td>{{ number_format($product->price, 2, ',', ' ') }} ₽</td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>{{ number_format($product->pivot->total_price, 2, ',', ' ') }} ₽</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                @endforeach
                @endforeach
            </table>
        </div>
    </div>
@endsection
