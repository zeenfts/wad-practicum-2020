@extends('layouts.app')@section('title', 'Home')

@section('content')
<div class="container text-center">
    @if (!$products->isEmpty())
    <div class="row justify-content-center">
        <img src="{{ $products[0]->img_path }}" alt="" srcset="">
            {{-- {{ dd($products[0]->img_path) }} --}}
    </div>
        @else
            @include('layouts.empty_table')
        @endif
</div>
@stop
