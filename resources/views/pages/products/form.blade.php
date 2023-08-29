@extends('layouts.template')
@section('content')
    @if ($data['type'] == 'add')
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
        @else
            <form action="{{ route('product.update', $data['data']->id) }}" method="POST">
                @csrf
                @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $data['list'] }}</h4>
                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary mt-3"><span
                            class="fas fa-long-arrow-alt-left"></span> Back To {{ $data['menu'] }}</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label for="errorInput">Product Name</label>
                                <input type="text" value="{{ old('name', $data['data']->name) }}" class="form-control"
                                    name="name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('type') has-error has-feedback @enderror">
                                <label for="errorInput">Product Type</label>
                                <input type="text" value="{{ old('type', $data['data']->type) }}" class="form-control"
                                    name="type">
                                @error('type')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('price') has-error has-feedback @enderror">
                                <label for="errorInput">Product Price</label>
                                <input type="text" value="{{ old('price', $data['data']->price) }}" class="form-control"
                                    name="price">
                                @error('price')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('quantity') has-error has-feedback @enderror">
                                <label for="errorInput">Product Quantity</label>
                                <input type="text" value="{{ old('quantity', $data['data']->quantity) }}"
                                    class="form-control" name="quantity">
                                @error('quantity')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="form-group @error('description') has-error has-feedback @enderror">

                                <label for="errorInput">Product Description</label>
                                <textarea id="summernote" name="description">{{ old('description', $data['data']->description) }}</textarea>
                                @error('description')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
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
