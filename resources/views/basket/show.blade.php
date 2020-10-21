@extends('layouts.app')


@section('content')
@foreach ($orders as $order)
    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-3 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">Catégorie 1</strong>
                <h5 class="mb-0">{{ $order->title }}</h5>
                <hr>
                <p class="mb-auto text-muted">{{ $order->description }}</p>
                <strong class="mb-auto font-weight-normal text-secondary">{{ $order->getPrice() }}</strong>

            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{ asset($order->picture) }}" alt="">
            </div>
        </div>
    </div>

@endforeach

<div class="row align-content-center">
    <p class="offset-3"> Totale :</p>
</div>


<button class="btn btn-outline-success btn-block text-uppercase">Valider la commande</button>
@endsection
