@extends('layouts.app')@section('title', 'Product')

@section('content')
<div class="container text-center">
    @if (!$products->isEmpty())
    <h3>List Products</h3>
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
                @foreach ($products as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6 p-0">
                                <form action="" method="post">
                                    <input type="submit" class="btn btn-success w-50" name="edit_prod" value="Edit">
                                </form>
                            </div>
                            <div class="col-md-6 p-0">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal_del">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_del" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Sure to delete this product?
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $item->name }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('prod_del', $item->id)}}" method="POST">
                                                    @csrf @method('delete')
                                                    {{-- <input type="hidden" name="id_item" value="{{ $item->id }}"> --}}
                                                    <button class="btn btn-danger" type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
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