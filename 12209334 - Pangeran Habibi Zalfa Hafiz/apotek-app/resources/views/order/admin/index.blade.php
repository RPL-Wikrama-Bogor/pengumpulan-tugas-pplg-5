@extends('layouts.template')

@section('content')
<div class="my-5 d-flex justify-content-between align-items-center">
    <form action="{{ route('admin.order.search2') }}" method="get" class="d-flex">
        <div class="input-group mr-2">
            <input type="date" name="search_date" class="form-control" value="{{ request('search_date') }}">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Cari</button>
        <a href="{{ route('admin.order.data') }}" class="btn btn-secondary mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
            </svg>
        </a>
    </form>

    <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">Export Data (Excel)</a>
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