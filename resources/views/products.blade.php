<!doctype html>
<html lang="en">
@include('parts.head')
<body>
@include('parts.navbar')

<div class="container py-3">
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            @foreach($products as $product)
                <tr>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3 text-bg-dark">
                                <a class="w-100 btn btn-lg btn-dark" href="{{route('product', $product->id)}}">
                                    <h4 class="my-0 fw-normal">{{$product['name']}}</h4>
                                </a>
                            </div>
                            <div class="card-body">
                                <img src="{{$product['image']}}" alt="Не удалось загрузить изображение." width="225"
                                     height="200">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <b>
                                        <li>
                                            <p>{{$product['price']}} ₽</p>
                                        </li>
                                    </b>
                                </ul>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
        </div>
    </main>
</div>

@include('parts.footer')
</body>
</html>
