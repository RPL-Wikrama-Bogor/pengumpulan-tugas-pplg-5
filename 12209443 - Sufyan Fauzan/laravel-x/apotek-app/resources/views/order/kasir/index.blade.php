@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex justify-content-between">
        <div class="mt-3 mb-3">
            <form action="{{ route('kasir.order.index') }}" method="GET" class="d-flex">
                <div class="input-group">
                    <input type="date" name="search_date" class="form-control">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
                <a href="{{ route('kasir.order.index') }}" class="btn btn'-primary">Resfresh</a>
            </form>
        </div>
        <div class="ml-auto">
            <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($orders as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item['name_customer'] }}</td>
                    <td>
                        @foreach ($item['medicine'] as $medicine)
                            <ol>
                                <li>
                                    {{ $medicine['name_medicine'] }} ({{ number_format($medicine['price'], 0, ',', ',') }})
                                    : Rp. {{ number_format($medicine['sub_price'], 0, ',', ',') }} <small>qty
                                        {{ $medicine['qty'] }}</small>
                                </li>
                            </ol>
                        @endforeach
                    </td>
                    <td>Rp. {{ number_format($item['total_price'], 0, ',', ',') }}</td>
                    <td>{{ $item['user']['name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td>
                        <a href="{{ route('kasir.order.download', ['id' => $item['id']]) }}" class="btn btn-secondary"
                            target="_blank">Download PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        @if ($orders->count())
            {{ $orders->links() }}
        @endif
    </div>
@endsection
