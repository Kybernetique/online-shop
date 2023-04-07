@extends('layouts.app')

@section('content')
    {{-- Cart --}}
    <div class="cart-box-main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="table-main table-responsive">
                        <table class="table">
                            {{-- is empty --}}
                            @if($cart->items()->count() == 0)
                                <p class="alert alert-warning">В вашей корзине нет товаров.</p>
                                {{--is not empty --}}
                            @else
                                <div>
                                    <thead>
                                    <tr>
                                        <th>Изображение</th>
                                        <th>Название товара</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                        <th>Итого</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart->items as $item)
                                        <tr>
                                            <td class="thumbnail-img">
                                                <img style="max-height: 100px" src="{{$item->product->image}}"
                                                     alt="Не удалось загрузить изображение"/>
                                            </td>
                                            <td class="name-pr">
                                                <p>{{$item->product->name}}</p>
                                            </td>
                                            <td class="price-pr">
                                                <p>{{ number_format($item->product->price, 2, ',', ' ') }} ₽</p>
                                            </td>
                                            <form method="POST" action="{{route('update-item', $item->id)}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <td class="quantity-box"><input type="number" size="4"
                                                                                value="{{$item->quantity}}"
                                                                                name="quantity" min="0" step="1"
                                                                                class="c-input-text qty text"></td>
                                                <td class="total-pr">
                                                    <p>{{ number_format($item->product->price * $item->quantity, 2, ',', ' ') }} ₽</p>
                                                </td>

                                                <td class="update-pr">
                                                    <button type="submit" name="action" value="update" title="Update"
                                                            class="btn btn-warning">Обновить
                                                    </button>

                                                    <button type="submit" name="action" value="delete" title="Delete"
                                                            class="btn btn-danger">Удалить
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </div>
                            @endif

                        </table>
                        <div class="d-flex justify-content-between mb-5"
                        @if($cart->items()->count() != 0)
                            <b><h5 class="text-uppercase">К оплате:</h5></b>
                            <b>
                                <h5>
                                    <p>{{ number_format($cart->total_price, 2, ',', ' ') }} ₽</p>
                                </h5>
                            </b>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($cart->items()->count() != 0)
            <div class="row">
                <div class="text-center"><a href="/user/cart/order"
                                            class="ml-auto btn btn-lg btn-warning">Оформить заказ</a></div>
            </div>
        @endif


    </div>
    </div>
@endsection
