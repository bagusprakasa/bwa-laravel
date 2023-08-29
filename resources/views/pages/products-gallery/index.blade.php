@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $data['list'] }}</h4>
                    @if (Request::segment(2) == 'show-gallery')
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary mt-3"><span
                                class="fas fa-long-arrow-alt-left"></span> Back To {{ $data['menu'] }}</a>
                    @else
                        <a href="{{ route('product-gallery.create') }}" class="btn btn-sm btn-primary mt-3"><span
                                class="fas fa-plus"></span> Add Data</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['data'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td><img width="200" src="{{ url($item->photo) }}"
                                                alt="{{ $item->product->name }}"></td>
                                        <td>{{ $item->is_default ? 'Default' : '-' }}</td>
                                        <td>
                                            @include('components.button-table', $item)
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
