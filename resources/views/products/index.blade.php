@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                {{-- Products --}}
                @foreach($products as $product)
                    <tr>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                {{-- Card header --}}
                                <div class="card-header py-3 text-bg-dark">
                                    {{-- Product name--}}
                                    <a class="w-100 btn btn-lg btn-dark" href="{{route('products.show', $product->id)}}">
                                        <h4 class="my-0 fw-normal">{{$product->name}}</h4>
                                    </a>
                                </div>

                                {{-- Card body--}}
                                <div class="card-body">
                                    {{-- Product image --}}
                                    <img src="{{$product->image}}" alt="Не удалось загрузить изображение." width="225"
                                         height="200">
                                    {{-- Product price --}}
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <b>
                                            <li>
                                                <p>{{$product->price}} ₽</p>
                                            </li>
                                        </b>
                                    </ul>
                                    {{-- Cart --}}
                                    <form method="POST" action="{{route('cart.store', $product->id)}}">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                {{-- Quantity --}}
                                                <div class="mt-2 col-6 col-md-4">
                                                    <td class="quantity-box"><input type="number" size="4"
                                                                                    value="{{ request('quantity', 1) }}"
                                                                                    name="quantity" min="1" step="1"
                                                                                    class="c-input-text qty text"></td>
                                                </div>
                                                {{-- Button add to cart --}}
                                                <div class="col-12 col-md-8">
                                                    <a style="text-decoration:none">
                                                        <button type="submit" class="w-100 btn btn-lg btn-warning">
                                                            Добавить в корзину
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </div>
        </main>
    </div>
@endsection
