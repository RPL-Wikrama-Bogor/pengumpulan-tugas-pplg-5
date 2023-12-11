@extends('layouts.template')
@section('content')
    <div class="mt-5 d-flex justify-content-between">
        <div class="mt-3 mb-3">
            <form action="{{ route('kasir.order.search') }}" method="GET" class="d-flex">
                @csrf
                <div class="input-group">
                    <input type="date" name="search_date" class="form-control" value="{{ request('search_date') }}">
                    <input type="hidden" name="page" value="{{ request('page') }}">
                    <button type="submit" name="submit_search" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
        <div class="input-group-append">
        <a href="{{ route('kasir.order.create')}}" class="btn btn-primary float-right">Tambah Pembelian</a>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Total Pembayaran</th>
                <th>Kasir</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                       {{$loop->iteration}}
                    </td>
                    <td>
                        {{ $order->nama_customer }}
                    </td>
                    <td>
                        <ol>
                            @php
                                $totalPembayaran = 0;
                            @endphp
                            @foreach ($order['medicanes'] as $medicine)
                                <li>
                                    {{ $medicine['name_medicine'] }}
                                    ( Rp. {{ number_format ($medicine['price'], 0, ',', '.') }}) :
                                    Rp. {{ number_format ($medicine['sub_price'], 0, ',', '.')}}
                                    <small>qty {{ $medicine['qty']}}</small>
                                </li>
                                @php
                                    $totalPembayaran += $medicine['sub_price'];
                                @endphp
                            @endforeach
                        </ol>
                    </td>
                    <td>
                        Rp. {{ number_format($totalPembayaran, 0, ',', '.') }}
                    </td>
                    <td>{{ $order['user']['name'] }}</td>
                    @php
                        setlocale(LC_ALL, 'IND');
                    @endphp
                    <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td>
                        <a href="{{ route('kasir.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $orders->links() }}
@endsection
