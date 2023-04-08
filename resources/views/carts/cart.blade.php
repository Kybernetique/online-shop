@extends('layouts.app')

@section('content')
    {{-- Cart --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">

                {{-- Cart is empty --}}
                @if($cart->items()->count() == 0)
                    <p class="alert alert-warning">В вашей корзине нет товаров.</p>
                @else
                    <table class="table">

                        {{-- Table header --}}
                        <thead class="table-dark">
                        {{-- Columns --}}
                        <tr>
                            <th>Изображение</th>
                            <th>Название товара</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Итого</th>
                            <th>Действие</th>
                        </tr>
                        </thead>

                        {{-- Table body --}}
                        <tbody>
                        {{-- Cart is NOT empty --}}
                        <div>
                            @foreach($cart->items as $item)
                                <tr>
                                    {{-- Image --}}
                                    <td>
                                        <img style="max-height: 100px" src="{{$item->product->image}}"
                                             alt="Не удалось загрузить изображение"/>
                                    </td>
                                    {{-- Name --}}
                                    <td>
                                        <p>{{$item->product->name}}</p>
                                    </td>
                                    {{-- Price per item --}}
                                    <td>
                                        <p>{{ number_format($item->product->price, 2, ',', ' ') }} ₽</p>
                                    </td>
                                    {{-- Update action --}}
                                    <td>
                                        <form method="POST" action="{{route('cart.update', $item->id)}}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input type="number" size="4"
                                                   value="{{$item->quantity}}"
                                                   name="quantity" min="1" step="1">
                                            <button type="submit" class="btn btn-warning">Обновить</button>
                                        </form>
                                    </td>
                                    {{-- Item total price --}}
                                    <td>
                                        <p>{{ number_format($item->product->price * $item->quantity, 2, ',', ' ') }}
                                            ₽</p>
                                    </td>
                                    {{-- Delete action--}}
                                    <td>
                                        <form method="POST" action="{{route('cart.destroy', $item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </div>
                        </tbody>
                    </table>
                @endif

                {{-- Cart total price --}}
                <div class="d-flex justify-content-between mb-5"
                @if($cart->items()->count() != 0)
                    <b><h5 class="text-uppercase">К оплате:</h5></b>
                    <b>
                        <h5><p>{{ number_format($cart->total_price, 2, ',', ' ') }} ₽</p></h5>
                    </b>
                @endif
            </div>
        </div>
    </div>

    {{-- Place order --}}
    @if($cart->items()->count() != 0)
        <div class="row">
            <div class="text-center"><a href="/user/cart/order"
                                        class="ml-auto btn btn-lg btn-warning">Оформить заказ</a></div>
        </div>
    @endif
@endsection
