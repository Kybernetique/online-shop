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
                            {{--                            @if(empty($cart))--}}
                            {{--                                <p class="alert alert-warning">В вашей корзине нет товаров.</p>--}}

                            {{--                                --}}{{-- is not empty --}}
                            @if(!empty($cart))
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
                                                <p>{{$item->product->price}}</p>
                                            </td>
                                            <form method="POST" action="{{route('update-item', $item->id)}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <td class="quantity-box"><input type="number" size="4"
                                                                                value="{{$item->quantity}}"
                                                                                name="quantity" min="0" step="1"
                                                                                class="c-input-text qty text"></td>
                                                <td class="total-pr">
                                                    <p>{{$item->product->price * $item->quantity}}</p>
                                                </td>

                                                <td class="update-pr">
                                                    <button type="submit" class="btn btn-warning">Обновить
                                                    </button>

                                                    <button type="submit" class="btn btn-danger">Удалить
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </div>
                            @endif

                        </table>
                        {{--                        <div class="d-flex justify-content-between mb-5" th:if="${!#lists.isEmpty(cart.getCartItemList)}">--}}
                        {{--                            <b><h5 class="text-uppercase">К оплате:</h5></b>--}}
                        {{--                            <b>--}}
                        {{--                                <h5><p th:text="${#numbers.formatDecimal(cart.totalPrice, 2, 'WHITESPACE', 2, 'COMMA') + ' ₽'}"></p></h5>--}}
                        {{--                            </b>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>

            {{--            <div th:if="${!#lists.isEmpty(cart.getCartItemList)}">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="text-center"><a href="/user/cart/order"--}}
            {{--                                                class="ml-auto btn btn-lg btn-warning">Оформить заказ</a></div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
    </div>
@endsection
