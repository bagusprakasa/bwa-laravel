@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $data['list'] }}</h4>
                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary mt-3"><span
                            class="fas fa-plus"></span> Add Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['data'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ Helper::rupiah($item->price) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-round btn-info"
                                                onclick="redirectTo('{{ route('product.show-gallery', $item->id) }}')">
                                                <i class="fas fa-image"></i>
                                            </button>
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
@push('custom-js')
    <script>
        function redirectTo(url) {
            window.location.href = url
        }
    </script>
@endpush
