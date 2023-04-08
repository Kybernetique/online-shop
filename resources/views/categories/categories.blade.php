@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach($categories as $category)
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3 text-bg-dark">
                                <h4 class="my-0 fw-normal">{{$category['name']}}</h4>
                            </div>
                            <div class="card-body">
                                <img src="{{$category['image']}}" alt="Не удалось загрузить изображение." width="200"
                                     height="200">
                                <ul class="list-unstyled mt-5 mb-4"></ul>
                                @if($category['name'] != 'Все товары')
                                    <a href="{{route('category', $category->id)}}"
                                       class="w-100 btn btn-lg btn-warning">Перейти</a>
                                @else
                                    <a href="{{route('products')}}" class="w-100 btn btn-lg btn-warning">Перейти</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
@endsection
