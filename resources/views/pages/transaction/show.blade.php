<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>{{ $data['transaction']->name }}</th>
    </tr>
    <tr>
        <th>Email</th>
        <th>{{ $data['transaction']->email }}</th>
    </tr>
    <tr>
        <th>Phone</th>
        <th>{{ $data['transaction']->number }}</th>
    </tr>
    <tr>
        <th>Address</th>
        <th>{{ $data['transaction']->address }}</th>
    </tr>
    <tr>
        <th>Total Transaction</th>
        <th>{{ Helper::rupiah($data['transaction']->transaction_total) }}</th>
    </tr>
    <tr>
        <th>Status Transaction</th>
        <th>{{ $data['transaction']->transaction_status }}</th>
    </tr>
    <tr>
        <th>Product</th>
        <td>
            <table class="table-bordered w-100">
                <tr>
                    <td>#</td>
                    <td>Product Name</td>
                    <td>Tipe</td>
                    <td>Price</td>
                </tr>
                @foreach ($data['transaction']->details as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->type }}</td>
                        <td>{{ Helper::rupiah($item->product->price) }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status', $data['transaction']->id) }}?status=SUCCESS"
            class="btn btn-success btn-block">Set Success</a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $data['transaction']->id) }}?status=FAILED"
            class="btn btn-danger btn-block">Set Failed</a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $data['transaction']->id) }}?status=PENDING"
            class="btn btn-warning btn-block">Set Pending</a>
    </div>
</div>
