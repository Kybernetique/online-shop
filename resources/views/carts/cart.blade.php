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
                            @if($cart)
                            @endif

                            {{-- is not empty --}}
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


{{--                                <tr th:each="cartItem : ${cart.getCartItemList}">--}}
{{--                                    <td class="thumbnail-img">--}}
{{--                                        <img style="max-height: 100px" th:src="${cartItem.product.image}"--}}
{{--                                             alt="Не удалось загрузить изображение"/>--}}
{{--                                    </td>--}}
{{--                                    <td class="name-pr">--}}
{{--                                        <p th:text="${cartItem.product.name}"></p>--}}
{{--                                    </td>--}}
{{--                                    <td class="price-pr">--}}
{{--                                        <p th:text="${#numbers.formatDecimal(cartItem.product.price, 2, 'WHITESPACE', 2, 'COMMA') + ' ₽'}"></p>--}}
{{--                                    </td>--}}
{{--                                    <form th:action="@{/user/cart/update/{product}(product=${cartItem.product.id})}"--}}
{{--                                          method="post">--}}
{{--                                        <input type="hidden" name="id" th:value="${cartItem.product.id}">--}}
{{--                                        <td class="quantity-box"><input type="number" size="4"--}}
{{--                                                                        th:value="${cartItem.getQuantity}"--}}
{{--                                                                        name="quantity" min="0" step="1"--}}
{{--                                                                        class="c-input-text qty text"></td>--}}
{{--                                        <td class="total-pr">--}}
{{--                                            <p th:text="${#numbers.formatDecimal(cartItem.totalPrice, 2, 'WHITESPACE', 2, 'COMMA') + ' ₽'}"></p>--}}
{{--                                        </td>--}}

{{--                                        <td class="update-pr">--}}

{{--                                            <button type="submit" name="action" value="update" title="Update"--}}
{{--                                                    class="btn btn-warning">Обновить--}}
{{--                                            </button>--}}

{{--                                            <button type="submit" name="action" value="delete" title="Delete"--}}
{{--                                                    class="btn btn-danger">Удалить--}}
{{--                                            </button>--}}
{{--                                        </td>--}}
{{--                                    </form>--}}
{{--                                </tr>--}}
                                </tbody>

                            </div>
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
