@extends('layouts.app')

{{--  @section('css', asset('card.css') )
@section('js', "{{ asset('card.js') }}")  --}}


@section('content')
<div >

    <div id="carouselExampleCaptions" class="carousel slide my-5" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="lapin.jpg" class="d-block w-100" style="height: 500px" alt="lapin.jpg">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="lapin.jpg" class="d-block w-100" style="height: 500px" alt="lapin.jpg">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="lapin.jpg" class="d-block w-100" style="height: 500px" alt="lapin.jpg">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="my-5"></div>

    <div>
        <div class="row ml-4 justify-content-center">
            @foreach ($products as $product)
                <div class="card m-3 col-sm-5" style="width: 18rem;">
                    <img src="{{ asset($product->picture) }}" class="card-img-top" style="height:350px; width:auto" alt="{{ $product->picture }}">
                    <div class="card-body">
                        <div class="row">
                            <p class="card-text text-uppercase text-center mr-auto">{{ $product->title }}</p>
                            <p class="card-text text-center ml-auto">{{ $product->getPrice() }}</p>
                        </div>
                        <div class="row justify-content-center">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary mr-2">Voir +</a>
                            <form  method="POST" action="{{ route('order.store') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-success"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
