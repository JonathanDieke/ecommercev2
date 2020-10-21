@extends('layouts.app')

@section("content")
    <div class="row">

        @foreach ($products as $product)
            <div class="col-sm-6 ">
                <div class="row rotate no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-sm-7 p-4 d-flex flex-column position-static">
                        <small class="d-inline-block mb-2">Catégorie</small>
                        <h5 class="mb-0">{{ $product->title }}</h5>
                        <p class="mb-auto text-muted text-truncate">{{ $product->description }}</p>
                        <strong class="mb-auto font-weight-normal text-secondary">{{ $product->price }} Francs CFA </strong>
                        <a href="{{ route('product.show', $product) }}" class="stretched-link btn btn-info">Voir plus</a>
                    </div>
                    <div class="col-4 d-none d-lg-block">
                        <img src="{{ $product->picture }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
