@extends('layouts.app')@section('title', 'Order Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Order Product</h3>
    </div>
    <div class="row pt-4 justify-content-center">
        <div class="col-md-auto">
            <div class="card" style="width:45em; box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                <div class="card-body p-2">
                    <div class="row px-2">
                        <div class="col-md-6 px-2">
                            <img src="{{ $prod->img_path }}" style="width:100%; height:100%">
                        </div>
                        <div class="col-md-6 px-2">
                            <h4>{{ $prod->name }}</h4>
                            <p style="font-size:14px">{{ $prod->description }}</p>
                            <p>Stock: {{ $prod->stock }}</p>
                            <b>${{ $prod->price }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-auto pt-3">
            <div class="card" style="width:45em; box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                <div class="card-body">
                    {{-- <form action="{{ route('prod_store') }}" method="post" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="form-group row-md-4">
                            Product Name
                            <input type="text" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->name : '' }}">
                        </div>
                        
                        <div class="form-group row-md-4">
                            Contact
                            <input type="text" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->stock : '' }}">
                        </div>

                        <div class="form-group row-md-4">
                            Quantity
                            <input type="number" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->stock : '' }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width:10em;">Submit</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($products[0]->img_path) }} --}}
</div>
@stop