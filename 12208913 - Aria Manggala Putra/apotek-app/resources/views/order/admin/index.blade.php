@extends('layouts.template')
@section('content')
<div class="mt-5 d-flex justify-content-between">
    <div class="mt-3 mb-3">
        <form action="{{ route('admin.order.cari') }}" method="GET" class="d-flex">
            @csrf
            <div class="input-group">
                <input type="date" name="cari" class="form-control" value="{{ request('cari') }}">
                <input type="hidden" name="page" value="{{ request('page') }}">
                <button type="submit" name="submit_search" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
        <div class="input-group-append">
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary float-right">Export Data (excel)</a>
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
                    <td>{{ $item['nama_customer'] }}</td>
                    <td>
                        @foreach ($item['medicanes'] as $medicine)
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
                        <a href="{{ route('kasir.order.download-pdf', ['id' => $item['id']]) }}" class="btn btn-secondary"
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