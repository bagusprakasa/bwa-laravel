@extends('layouts.template')
@section('content')
    @if ($data['type'] == 'add')
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
        @else
            <form action="{{ route('transaction.update', $data['data']->id) }}" method="POST">
                @csrf
                @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $data['list'] }}</h4>
                    <a href="{{ route('transaction.index') }}" class="btn btn-sm btn-primary mt-3"><span
                            class="fas fa-long-arrow-alt-left"></span> Back To {{ $data['menu'] }}</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label for="errorInput">Name</label>
                                <input type="text" value="{{ old('name', $data['data']->name) }}" class="form-control"
                                    name="name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('email') has-error has-feedback @enderror">
                                <label for="errorInput">Email</label>
                                <input type="text" value="{{ old('email', $data['data']->email) }}" class="form-control"
                                    name="email">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('phone') has-error has-feedback @enderror">
                                <label for="errorInput">Phone</label>
                                <input type="number" value="{{ old('phone', $data['data']->number) }}" class="form-control"
                                    name="phone">
                                @error('phone')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group @error('address') has-error has-feedback @enderror">
                                <label for="errorInput">Address</label>
                                <input type="text" value="{{ old('address', $data['data']->address) }}"
                                    class="form-control" name="address">
                                @error('address')
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
