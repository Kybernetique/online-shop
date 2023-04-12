@extends('layouts.app')

@section('content')
    <form action="{{route('orders.store')}}" method="post" class="needs-validation" novalidate>
        @csrf
        {{-- Order placing header --}}
        <div class="text-center mt-5 mb-5"><h1>Оформление заказа</h1></div>

        {{-- User id--}}
        <input type="hidden" name="user_id" value="{{$user->id}}">
        {{-- Name, Phone number and Email row--}}
        <div class="row justify-content-center">
            <!-- Name -->
            <div class="col-md-2 mb-3">
                <label for="validationTooltipName">Имя</label>
                <input type="text" name="name" class="form-control" id="validationTooltipName" value="{{$user->name}}"
                       placeholder="Иван" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите Ваше имя.
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-2 mb-3">
                <label for="validationCustomPhoneNumber">Номер телефона</label>
                <input type="text" name="phone_number" class="form-control" id="validationCustomPhoneNumber"
                       placeholder="89997896959" value="{{$user->phone_number}}" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите номер телефона.
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Email -->
            <div class="col-md-4 mb-3">
                <label for="validationCustomUsername">Электронная почта</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" name="email" class="form-control" id="validationCustomUsername"
                           placeholder="ivanov89@gmail.com" value="{{$user->email}}"
                           aria-describedby="inputGroupPrepend" required>

                    <div class="invalid-feedback">
                        Пожалуйста, введите электронную почту.
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipping address, entrance, door's password, floor, apartment --}}
        <div class="row justify-content-center">
            <!-- Shipping Address -->
            <div class="col-md-4 mb-3 mt-4">
                <label for="validationCustomShippingAddress">Адрес доставки</label>
                <input type="text" name="shipping_address" class="form-control" id="validationCustomShippingAddress"
                       placeholder="г. Москва, ул. Маломосковская, д. 7, корп. 1" value="г. Москва, ул. Маломосковская, д. 7, корп. 1" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите адрес доставки.
                </div>
            </div>

            <div class="row justify-content-center">
                {{-- Entrance --}}
                <div class="col-md-1 mb-3">
                    <label for="validationCustomEntrance">Подъезд</label>
                    <input type="text" name="entrance" class="form-control" id="validationCustomEntrance"
                           placeholder="1" value="1" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите номер подъезда.
                    </div>
                </div>
                {{-- Door's password --}}
                <div class="col-md-1 mb-3">
                    <label for="validationCustomDoorPassword">Код двери</label>
                    <input type="text" name="door_password" class="form-control" id="validationCustomDoorPassword"
                           placeholder="15" value="15" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите код двери.
                    </div>
                </div>
                {{-- Floor --}}
                <div class="col-md-1 mb-3">
                    <label for="validationCustomFloor">Этаж</label>
                    <input type="text" name="floor" class="form-control" id="validationCustomFloor"
                           placeholder="4" value="4" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите номер этажа.
                    </div>
                </div>
                {{-- Apartment --}}
                <div class="col-md-1 mb-3">
                    <label for="validationCustomApartment">Квартира</label>
                    <input type="text" name="apartment" class="form-control" id="validationCustomApartment"
                           placeholder="15" value="15" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите номер квартиры.
                    </div>
                </div>
            </div>
        </div>
        {{-- Comment --}}
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <label>Комментарий к заказу <p class="small text-muted">(необязательно)</p></label>
                <textarea class="form-control" name="comment" rows="3"></textarea>
            </div>
        </div>

        {{-- Orders --}}
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5 mt-4">
                <h5>Заказы</h5>
                @foreach($products as $product)
                    <input type="hidden" name="products[]" value="{{$product}}">
                    <ul class="list-group">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <li class="list-group-item">{{$product->name}} ({{$product->pivot->quantity}} шт.)</li>
                    </ul>
                @endforeach
            </div>
        </div>

        {{-- Button 'purchase'--}}
        <div class="text-center">
            <button class="btn btn-warning" type="submit">Приобрести</button>
        </div>
    </form>

    {{-- Validation script --}}
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
