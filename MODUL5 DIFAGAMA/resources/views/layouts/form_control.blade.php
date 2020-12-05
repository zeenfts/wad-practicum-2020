<div class="form-group row-md-4">
    Product Name
    <input type="text" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->name : '' }}">
</div>

<div class="form-group row-md-4">
    Price
    <div class="input-group pt-1">
        <div class="input-group-prepend">
            <span class="input-group-text">$ USD</span>
        </div>
        <input type="number" class="form-control" required="required" value="{{ isset($item) ? $item->price : ''}}">
    </div>
</div>

<div class="form-group">
    Description
    <textarea name="body" id="body" rows=3
        class="form-control pt-1 @error('body') is-invalid @enderror">
        {{ isset($item) ? $item->description : '' }}
    </textarea>
    @error('body')
    <div class="mt-2 text-danger">
        {{ $message }}
</div>
@enderror
</div>

<div class="form-group row-md-4">
    Stock
    <input type="number" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->stock : '' }}">
</div>

<div class="form-group row-md-4">
    Image file input
    <div class="input-group pt-1">
        <div class="custom-file">
            <input type="file" class="custom-file-input" required="required" accept="image/*" id="inputImage">
            <label for="inputImage" class="custom-file-label">{{ isset($item) ? \Str::limit($item->img_path, 53) : "Choose Image" }}</label>
        </div>
    </div>

</div>