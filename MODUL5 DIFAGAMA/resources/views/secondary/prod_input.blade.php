@extends('layouts.app')@section('title', 'Input Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Input Product</h3>
    </div>
    <div class="row pt-4 justify-content-center">
        <div class="col-md-auto">
            <div class="card" style="width:45em; box-shadow: rgba(0, 0, 0, 0.8) 0px 7px 10px, inset rgba(0, 0, 0, 0.15) 0px 0px 3px;">
                <div class="card-body">
                    <form action="{{ route('prod_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('layouts.form_control')
                        <button type="submit" class="btn btn-primary" style="width:10em;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($products[0]->img_path) }} --}}
</div>
@stop