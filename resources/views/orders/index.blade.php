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
{{--                @foreach($orders as $order)--}}
                    <tr>
{{--                        <th scope="row" {{$order->id}}></th>--}}
{{--                        <td>{{$order->product->name}}</td>--}}
{{--                        <td th:text="${#numbers.formatDecimal(info.product.price, 2, 'WHITESPACE', 2, 'COMMA')} + ' ₽'"></td>--}}
{{--                        <td th:text="${info.quantity}"></td>--}}
{{--                        <td th:text="${#numbers.formatDecimal(info.totalPrice, 2, 'WHITESPACE', 2, 'COMMA') + ' ₽'}"></td>--}}
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
{{--                @endforeach--}}
            </table>
        </div>
    </div>
@endsection
