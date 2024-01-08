@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">Export Data (Excel)</a>
    </div>
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>kasir</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="text-center">
                    <td>{{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1}}</td>
                    <td>{{ $order->name_customer }}</td>
                    <td>
                        {{-- nested loop : didalam looping ada looping --}}
                        {{-- karna column medicines tipe datanya berbentuk array json,  --}}
                        <ol>
                            {{-- hsail yang diinginkan : --}}
                            {{-- 1. nama obat (Rp. 3000)  : Rp. 150000 qty 5 --}}
                            @foreach ($order['medicines'] as $medicine)
                                <li>{{ $medicine['name_medicine'] }} (Rp.
                                    {{ number_format($medicine['price'], 0, ',', '.') }} ) :
                                    {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>qty
                                        {{ $medicine['qty'] }}</small></li>
                            @endforeach
                        </ol>
                    </td>
                    <td>{{ $order['user']['name'] }}</td>
                    {{-- carbon : package bawaan laravel untuk mengatur hal2 yg berkaitan dengan ripe data date/datetime --}}
            
                    <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td><a href="{{ route('admin.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
