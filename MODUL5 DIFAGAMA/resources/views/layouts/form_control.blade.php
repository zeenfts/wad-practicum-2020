<div class="form-group row-md-4">
    Product Name
    <input type="text" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->name : '' }}" name="name">
</div>

<div class="form-group row-md-4">
    Price
    <div class="input-group pt-1">
        <div class="input-group-prepend">
            <span class="input-group-text">$ USD</span>
        </div>
        <input type="number" class="form-control" required="required" value="{{ isset($item) ? $item->price : ''}}" name="price">
    </div>
</div>

<div class="form-group">
    Description
    <textarea name="description" id="body" rows=3 
        class="form-control pt-1" required>
        {{ isset($item) ? $item->description : '' }}
    </textarea>
    {{-- <textarea name="description" id="body" rows=3 
        class="form-control pt-1 @error('body') is-invalid @enderror" required="required">
        {{ isset($item) ? $item->description : '' }}
    </textarea>
    @error('body')
    <div class="mt-2 text-danger">
        isilah
    </div>
    @enderror --}}
</div>

<div class="form-group row-md-4">
    Stock
    <input type="number" class="form-control pt-1" required="required" value="{{ isset($item) ? $item->stock : '' }}" name="stock">
</div>

<div class="form-group row-md-4">
    Image file input
    <div class="input-group pt-1">
        <div class="custom-file">
            <input type="hidden" name="img_hddn" value="{{ isset($item) ? $item->img_path : '' }}">
            <input type="file" class="custom-file-input" accept="image/*" id="inputImage" name="img_path">
            <label for="inputImage" class="custom-file-label">{{ isset($item) ? \Str::limit($item->img_path, 53) : 'Choose Image' }}</label>
        </div>
    </div>

</div>