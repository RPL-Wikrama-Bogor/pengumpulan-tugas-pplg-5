@extends('layouts.template')

@section('content')
    <form action="{{ route('admin.order.data') }}" method="GET" class="d-flex">
        <div class="input-group">
            <input type="date" name="search_date" class="form-control">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <a href="{{ route('kasir.order.index') }}" class="btn btn'-primary">Resfresh</a>
    </form>
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">Export Data (excel)</a>
    </div>
    <table class="table table-striped table-bordered my-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Pembelian</th>
                <th>Obat</th>
                <th>Kasir</th>
                <th>tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        {{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1 }}
                    </td>
                    <td>{{ $order->name_customer }}</td>
                    <td>
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                <li>
                                    {{-- hasil yang diinginkan: --}}
                                    {{-- 1. nama obat (Rp. 3000) : Rp. 15000 qty 5 --}}
                                    {{ $medicine['name_medicines'] }}
                                    (Rp. {{ number_format($medicine['price'], 0, ',', '.') }})
                                    :
                                    Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                                    <small>qty {{ $medicine['qty'] }}</small>
                                </li>
                            @endforeach
                        </ol>
                    </td>
                    <td>{{ $order['user']['name'] }}</td>
                    {{-- carbon : package bawaan laravel untuk mengatur hal hal yang berkaitan dengan tipe data date/datetime --}}
                    @php

                    @endphp
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td><a href="{{ route('admin.order.download', $order['id']) }}" class="btn btn-secondary">Unduh
                            (.pdf)</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
