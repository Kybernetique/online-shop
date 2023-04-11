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
                <label for="validationTooltip01">Имя</label>
                <input type="text" name="name" class="form-control" id="validationTooltip01" value="{{$user->name}}"
                       placeholder="Имя" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите Ваше имя.
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-2 mb-3">
                <label for="validationCustom05">Номер телефона</label>
                <input type="text" name="phone_number" class="form-control" id="validationCustom05"
                       placeholder="Номер телефона" required>
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
                           placeholder="Электронная почта" value="{{$user->email}}"
                           aria-describedby="inputGroupPrepend" required>

                    <div class="invalid-feedback">
                        Пожалуйста, введите электронную почту.
                    </div>
                </div>
            </div>
        </div>

        {{-- City, Shipping address and comment row--}}
        <div class="row justify-content-center">
            <!-- City -->
            <div class="col-md-1 mb-3">
                <label for="controlSelect1">Город</label>
                <select class="form-control" id="controlSelect1" name="city">
                    <option>Москва</option>
                    <option>Санкт-Петербург</option>
                    <option>Казань</option>
                    <option>Самара</option>
                    <option>Ульяновск</option>
                    <option>Нижний Новгород</option>
                </select>
                <div class="invalid-feedback">
                    Пожалуйста, выберите город.
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Адрес доставки</label>
                <input type="text" name="shipping_address" class="form-control" id="validationCustom04"
                       placeholder="Адрес доставки" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите адрес доставки.
                </div>
            </div>
        </div>
        {{-- Comment --}}
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <label for="textarea0">Комментарий к заказу</label>
                <textarea class="form-control" id="textarea0" rows="3"></textarea>
            </div>
        </div>

        {{-- Cart items --}}
        <div class="row justify-content-center">
            <div class="col-md-4 mb-5 mt-5">
                <h4>Заказы</h4>
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
