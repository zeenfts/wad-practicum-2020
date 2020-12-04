<div class="form-group row-md-4">
    Product Name
    <input type="text" class="form-control pt-1" required="required">
</div>

<div class="form-group row-md-4">
    Price
    <div class="input-group pt-1">
        <div class="input-group-prepend">
            <span class="input-group-text">$ USD</span>
        </div>
        <input type="number" class="form-control" required="required">
    </div>
</div>

<div class="form-group">
    Description
    <textarea name="body" id="body"
        class="form-control pt-1 @error('body') is-invalid @enderror">{{ old('body') ?? '$item->description' }}</textarea>
    {{-- @error('body')
    <div class="mt-2 text-danger">
        {{ $message }}
</div>
@enderror --}}
</div>

<div class="form-group row-md-4">
    Stock
    <input type="number" class="form-control pt-1" required="required">
</div>

<div class="form-group row-md-4">
    Image file input
    <div class="input-group pt-1">
        <div class="custom-file">
            <input type="file" class="custom-file-input" required="required" accept="image/*" id="inputImage">
            <label for="inputImage" class="custom-file-label">Choose Image</label>
        </div>
    </div>
    
</div>