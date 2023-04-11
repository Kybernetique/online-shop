@extends('layouts.app')
@section('content')
    <div class="text-center mt-5">
        <h1>Ваш заказ оформлен!</h1> <br>
        <p>Благодарим за заказ!</p>
        <p>Номер Вашего заказа: №{{$order->id}}</p>
        <p>Заказ будет доставлен в город: {{$order->city}}</p>
        <p>по адресу: {{$order->shipping_address}}</p>
        <p>Детали заказа будут отправлены
            на Вашу электронную почту {{$order->email}}</p></div>
    <section>
        <div class="cart-box-main">
            <div class="container mt-5">
                <h1>Детали заказа</h1> <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Дата заказа</th>
                                    <th>Название товара</th>
                                    <th>Количество</th>
                                    <th>Способ оплаты</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products()->get() as $product)
                                    <tr>
                                        <td>
                                            <!-- Order date -->
                                            <span><b>{{now()->format('d-m-Y')}}</b></span>
                                        </td>
                                        <td>
                                            <!-- Product name -->
                                            <a href="{{route('products.show', $product->id)}}">
                                                {{$product->name}}
                                            </a>
                                        </td>
                                        <!--Количество-->
                                        <td>{{$product->pivot->quantity}}</td>
                                        <td style="color: black">
                                            <!-- Способ оплаты-->
                                            <span>Наличными</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
