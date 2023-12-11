@extends('layouts.template')

@section('content')
<div class="my-5 d-flex justify-content-end">
    <form action="{{ route('cashier.order.search') }}" method="get">
        <div class="input-group">
            <input type="date" name="search_date" class="form-control" value="{{ request('search_date') }}">
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
            <a  href="{{ route('cashier.order.index')}} "><i class="bi bi-arrow-counterclockwise">cek</i></a>
        </div>
    </form>
</div>
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('cashier.order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
    </div>
    <table class="table table-striped table-bordered ">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Pembelian</th>
                <th>Obat</th>
                <th>Kasir</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>         
            @foreach ($orders as $order)
                <tr>
                    <td class="text-center">{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                    <td class="text-center">{{ $order->name_customer }}</td>
                    <td>
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                <li>{{ $medicine['name_medicine'] }} 
                                (Rp. {{ number_format($medicine['price'], 0, ',', '.') }}) : 
                                Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                                <small>qty{{ $medicine['qty'] }}</small></li>
                            @endforeach
                        </ol>
                    </td>
                    <td class="text-center">{{ $order['user']['name'] }}</td>
                    @php 
                        setlocale(LC_ALL, 'IND');
                    @endphp
                    <td class="text-center">{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td class="text-center"><a href="{{ route('cashier.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh PDF</a></td>
                </tr>    
            @endforeach
        </tbody>
    </table>
@endsection