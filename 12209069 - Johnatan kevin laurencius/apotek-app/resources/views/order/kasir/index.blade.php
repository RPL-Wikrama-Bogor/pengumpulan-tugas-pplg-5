@extends('layouts.template')

@section('content')
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ Route('kasir.order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
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
                    <td><a href="{{ Route('kasir.order.download', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $orders->links() }}
    </div>
@endsection