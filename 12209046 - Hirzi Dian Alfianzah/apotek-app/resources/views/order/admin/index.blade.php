{{-- panggil file template --}}
@extends('layouts.template')

{{-- isi bagian yield --}}
@section('content')
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">Export Data (excel)</a>
    </div>
    <form action="{{ route('admin.order.searchadmin') }}" method="get">
        <div class="input-group mb-3" style="width: 300px">
            <input type="date" name="search" class="form-control" placeholder="Cari pembelian..." >
            <button type="submit" class="btn btn-outline-secondary badge bg-primary text-wrap" style="width: 50px">Cari</button>
            <button type="submit" class="btn btn-secondary badge bg-primary text-wrap" style="width: 50px margin-left:100px;">Restart</button>
        </div>
    </form>

    <table class="table table-stripped 1">
        <thead>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Kasir</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>
                    {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}
                </td>
                <td>{{ $order['name_customer'] }}</td>
                <td>
                    {{-- nested loop: didalam looping ada looping --}}
                    {{-- karena kolom medicines tipe datanya berbentuk array JSON, maka untuk mengaksesnya perlu dilakukan perulangan --}}
                    <ol>
                        @foreach ($order->medicines as $medicine)
                            <li>{{ $medicine['name_medicine'] }} 
                                (Rp. {{ number_format($medicine['price'], 0, ',', '.') }}) : 
                                Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                                <small>qty {{ $medicine['qty'] }}</small>
                            </li>
                        @endforeach
                    </ol>
                </td>
                <td>{{ $order['user']['name'] }}</td>
                {{-- Carbon: package bawaan Laravel untuk mengatur hal-hal yang berkaitan dengan tipe data date/datetime --}}
                @php
                    setlocale(LC_ALL, 'IND');
                @endphp
                <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                <td> <a href="{{ route('admin.order.download-pdf', $order->id) }}" class="btn btn-secondary">Unduh(.pdf)</a></td>
            </tr>
        @endforeach        
        </tbody>
    </table>
@endsection