@extends('layouts.app')@section('title', 'History')

@section('content')
<div class="container text-center">
    @if (!$orders->isEmpty())
    <h3>History</h3>
    <div class="row pt-4">
        <table class="table text-center table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Buyer Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->buyer_name }}</td>
                    <td>{{ $order->buyer_contact}}</td>
                    <td>{{ $order->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        @include('layouts.empty_table')
    @endif
        {{-- {{ dd($products[0]->img_path) }} --}}
</div>
@stop