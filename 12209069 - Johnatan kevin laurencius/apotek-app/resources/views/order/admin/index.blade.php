@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex justify-content-between">
        <div class="mt-3 mb-3">
            <form action="{{ route('admin.order.search') }}" method="GET" class="d-flex">
                @csrf
                <div class="input-group">
                    <input type="date" name="search_date" class="form-control" value="{{ request('search_date') }}">
                    <input type="hidden" name="page" value="{{ request('page') }}">
                    <button type="submit" name="submit_search" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route("admin.order.export-excel") }}" class="btn btn-primary">Export Data (excel)</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th>Tanggal</th>
                <th>Aksi</th>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($orders as $order)
                <tr>
                    <td>{{ ($orders ->currentpage()-1) * $orders ->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $order->name_customer }}</td>
                    <td>
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                <li>{{ $medicine['name_medicine'] }} ( Rp. {{ number_format($medicine['price'], 0, ',', '.') }}) : 
                                    Rp. {{ number_format($medicine['sub_price'], 0, ',', '.')}}
                                    <small>qty {{ $medicine['qty'] }}</small>
                                </li>
                            @endforeach
                        </ol>
                    </td>
                    <td>Rp. {{ number_format($order['total_price_ppn'], 0, ',', '.')}}</td>
                    <td>{{ $order['user']['name'] }}</td>
                    @php
                        setlocale(LC_ALL, 'IND');
                    @endphp
                    <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td><a href="{{ Route('admin.order.download', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection