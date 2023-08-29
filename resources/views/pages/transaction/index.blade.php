@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $data['list'] }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Total Transaction</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['data'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ Helper::rupiah($item->transaction_total) }}</td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-warning">
                                                @elseif($item->transaction_status == 'SUCCESS')
                                                    <span class="badge badge-success">
                                                    @else
                                                        <span class="badge badge-danger">
                                            @endif
                                            {{ $item->transaction_status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <button type="button" class="btn btn-icon btn-round btn-success"
                                                    onclick="redirectTo('{{ route('transaction.status', $item->id) }}?status=SUCCESS')"
                                                    data-toggle="tooltip" data-placement="top" title="Success">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-round btn-warning"
                                                    onclick="redirectTo('{{ route('transaction.status', $item->id) }}?status=FAILED')"
                                                    data-toggle="tooltip" data-placement="top" title="Failed">
                                                    <i class="fab fa-xing"></i>
                                                </button>
                                            @endif
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-icon btn-round btn-info detailTransaksi"
                                                data-remote="{{ route('transaction.show', $item->id) }}"
                                                data-title="Detail Transaksi {{ $item->uuid }}" data-toggle="modal"
                                                data-target="#exampleModal" data-toggle="tooltip" data-placement="top"
                                                title="Detail">
                                                <i class="fas fa-eye"></i>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@push('custom-js')
    <script>
        function redirectTo(url) {
            window.location.href = url
        }
        $('.detailTransaksi').click(function(e) {
            var remote = $(this).data('remote');
            var title = $(this).data('title');

            $('.modal-body').empty();
            $('#exampleModalLabel').html(title);
            $.ajax({
                type: "get",
                url: remote,
                data: "json",
                success: function(response) {
                    $('.modal-body').append(response);
                }
            });
        });
    </script>
@endpush
