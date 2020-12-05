@extends('layouts.app')@section('title', 'Order')

@section('content')
<div class="container-fluid text-center" style="padding:0 11.4em;">
    @if (!$products->isEmpty())
    <h3>Order</h3>
    <div class="row pt-4">
        @foreach ($products as $item)
        {{-- <div class="row-md-4"> --}}
        <div class="col-md-3 pb-4">
            <div class="card"
                style="width:17.5em;height:26.1em;box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                <div class="card-head pt-1">
                    <img src="{{ preg_match('/(http|ftp|mailto)/', $item->img_path) ? $item->img_path : asset('img').'/'.$item->img_path }}"
                        style="width: 17.2em; height:11em">
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="row px-2 pb-1 text-center">
                        <h6>{{ $item->name }}</h6>
                    </div>
                    <div class="row px-2 text-center">
                        <p>{{ $item->description }}</p>
                    </div>
                    <div class="row mt-auto pt-2 px-2 text-left">
                        <div class="col-md-12">
                            <b>${{ $item->price }}.00</b>
                        </div>
                        <div class="col-md-12 pt-1">
                            <a href="{{ route('prod_order', $item) }}" class="btn btn-secondary">Order Now</a>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
        @endforeach
    </div>
    <div class="row d-flex justify-content-center pt-4">
        <div>
            {{ $products->links() }}
        </div>
    </div>
        @else
            @include('layouts.empty_table')
        @endif
        {{-- {{ dd($products[0]->img_path) }} --}}
</div>
@stop