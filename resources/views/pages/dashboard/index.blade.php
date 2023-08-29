@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><i class="fas fa-money-bill" style="color: #28a745"></i> Total Income</div>
                </div>
                <div class="card-body">
                    <h3>{{ Helper::rupiah($data['totalTransaction'][0]->grandTotal) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><i class="fas fa-shopping-cart" style="color: #007bff"></i> Total Order</div>
                </div>
                <div class="card-body">
                    <h3>{{ $data['sales'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">New Order List</div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['transaction'] as $item)
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-js')
    <script>
        var doughnutChart = document.getElementById('doughnutChart').getContext('2d');
        var myDoughnutChart = new Chart(doughnutChart, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [{{ $data['pending'] }}, {{ $data['failed'] }}, {{ $data['success'] }}],
                    backgroundColor: ['#ffc107', '#dc3545', '#28a745']
                }],

                labels: [
                    'Pending',
                    'Failed',
                    'Success'
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right'
                },
            }
        });
    </script>
@endpush
