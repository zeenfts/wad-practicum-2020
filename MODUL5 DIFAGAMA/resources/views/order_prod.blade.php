@extends('layouts.app')@section('title', 'Order')

@section('content')
<div class="container text-center">
    @if (!$products->isEmpty())
    <h3>Order</h3>
    <div class="row pt-4">
        @foreach ($products as $item)
        <div class="card w-25 h-50" style="box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
            <div class="card-head pt-1">
                <img src="{{ $item->img_path }}" style="width: 17.2em; height:11em">
            </div>
            <div class="card-body">
                <div class="row px-2 text-center">
                    <h6>{{ $item->name }}</h6><br>
                    <p>{{ $item->description }}</p><br>
                    <b>$ {{ $item->price }}</b>
                </div>
                <div class="row pt-2 px-2">
                    <a href="{{ route('prod_order', $item) }}" class="btn btn-secondary">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    @else
        @include('layouts.empty_table')
    @endif
        {{-- {{ dd($products[0]->img_path) }} --}}
    </div>
</div>
@stop