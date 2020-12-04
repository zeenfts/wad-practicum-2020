@extends('layouts.app')@section('title', 'Input Product')

@section('content')
<div class="container text-center">
    <h3>Update Product</h3>
    <div class="row pt-4">
        <div class="col-md-auto card-temp">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row-md-4">
                        Product Name
                        <input type="text" class="form-control" name="emaill" value=""
                        required="required">
                    </div>

                    <div class="form-group row-md-4">
                        Price
                        <input type="number" class="form-control" name="sandi1" value=""
                        required="required">
                    </div>

                    <div class="form-group">
                        Description
                        <textarea
                            name="body"
                            id="body"
                            class="form-control @error('body') is-invalid @enderror"
                            >{{ old('body') ?? $prods->description }}</textarea
                        >
                        {{-- @error('body')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror --}}
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-primary" value="Login" name="login_form"
                        style="width:10em;">
                    <!-- <input type="reset" class="btn btn-light" value="Clear"
                        onmouseover="this.style.color='red';" onmouseout="this.style.color='';"> -->
                    <a class="btn hover-t" href="register_beauty.php">
                        Belum punya akun? <span class="text-primary">Registrasi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
        {{-- {{ dd($products[0]->img_path) }} --}}
</div>
@stop