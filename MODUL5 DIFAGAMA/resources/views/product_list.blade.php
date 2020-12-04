@extends('layouts.app')@section('title', 'Product')

@section('content')
<div class="container text-center">
    <h3>List Product</h3>
    <div class="row pb-2">
        <button type="submit" class="btn btn-secondary">Add product</button>
    </div>
    <div class="row">
        <table class="table text-center table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $item)
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6 p-0">
                                <form action="" method="get"
                                    onsubmit="return confirm('Yakin ingin membatalkan pesanan Skincare ini?');">
                                    <input type="submit" class="btn btn-success w-50" name="edit_prod" value="Edit">
                                </form> 
                            </div>
                            <div class="col-md-6 p-0">
                                <a href="db_conn_byu.php?delp=" class="btn btn-danger w-50" role="button">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ dd($products[0]->img_path) }} --}}
    </div>
</div>
@stop