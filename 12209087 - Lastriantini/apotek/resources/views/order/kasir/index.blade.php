@extends('layouts.template')

@section('content')
{{-- my = atas bawah y --}}
{{-- bootstrap 4 pake left right (rt) kalo 5 pake end start --}}
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Export Data (excel)</a>
    </div>
    <form class="form mb-1 d-inline" action="{{ route('kasir.order.index') }}" method="GET">
        <input  class="form-control w-25" type="date" name="query" placeholder="Cari pengguna...">
        <button class="btn btn-primary"type="submit">Search</button>
        <a href="{{ route('kasir.order.index') }}" class="btn btn-secondary">Clear</a>
    </form>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Kasir</th>
                <th>tanggal pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($orders as $order)
                <tr>
                    {{-- menampilkan angka uturan berdasarkan page pagination (digunakan ketika mengambil data dengan peginate/simplePaginate) --}}
                    <td>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index +1 }}</td>
                    {{-- <td>{{$no++}}</td> --}}
                    <td>{{ $order->name_customer }}</td>
                    <td>
                        {{-- nested loop : didalam looping ada looping --}}
                        {{-- karena column medicines tipe datanya berbentuk array json, maka untuk mengaksesnya perlu di looping juga --}}
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                {{-- hasil yg diinginkan --}}
                                {{-- 1. nama obat(rp.3000) : Rp.15000 qyt 5 --}}
                                <li>
                                {{ $medicine['name_medicine'] }} 
                                ( Rp. {{ number_format($medicine['price'], 0, ',', '.') }} ) :
                                Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                                <small>qty{{ $medicine['qty'] }}</small></li>
                            @endforeach
                        </ol>
                    </td>
                    <td>{{ $order['user']['name'] }}
                        {{-- carbon : package bawaan laravel untuk emngatur hal hal yang berkaitan dengan tipe data data/datetime --}}
                        @php
                            // setting local time sebagai wilayah indonesia
                            setlocale(LC_ALL, 'IND');
                        @endphp
                        <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                        <td><a href="{{ route('kasir.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($orders->count())
            {{$orders->links()}}
        @endif
    </div>
@endsection