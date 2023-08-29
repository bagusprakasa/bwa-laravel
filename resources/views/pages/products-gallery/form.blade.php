@extends('layouts.template')
@section('content')
    @if ($data['type'] == 'add')
        <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        @else
            <form action="{{ route('product-gallery.update', $data['data']->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $data['list'] }}</h4>
                    <a href="{{ route('product-gallery.index') }}" class="btn btn-sm btn-primary mt-3"><span
                            class="fas fa-long-arrow-alt-left"></span> Back To {{ $data['menu'] }}</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('product') has-error has-feedback @enderror">
                                <label for="errorInput">Product</label>
                                <div class="select2-input">
                                    <select id="basic" name="product" class="form-control">
                                        <option value="">---Choose Product---</option>
                                        @foreach ($data['productList'] as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == old('product', $data['data']->product) ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="input-file input-file-image">
                                <img class="img-upload-preview" width="150" src="http://placehold.it/150x150"
                                    alt="preview">
                                <input type="file" class="form-control form-control-file" id="uploadImg2" name="photo"
                                    accept="image/*">
                                <label for="uploadImg2" class="label-input-file btn btn-black btn-round"
                                    style="@error('photo') background:#F25961 !important  @enderror">
                                    <span class="btn-label">
                                        <i class="fa fa-file-image"></i>
                                    </span>
                                    Upload a Image
                                </label>
                                @error('photo')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-check form-check-inline @error('is_default') has-error has-feedback @enderror">
                                <label for="errorInput">Is Default</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="is_default" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="is_default" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">No</label>
                                </div>
                            </div>
                            @error('is_default')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <button class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
@push('custom-js')
    <script>
        $('#summernote').summernote({
            placeholder: 'Product Description',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
    </script>
@endpush
