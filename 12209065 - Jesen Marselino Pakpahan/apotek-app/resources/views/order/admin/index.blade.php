@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.order.exportexcel')}}" class="btn btn-primary">Export Data (excel)</a>
    </div>
    <table class="table table-stripped table-border">
        <thead>
            <tr>
                <td>No</td>
                <td>Pembeli</td>
                <td>Obat</td>
                <td>Kasir</td>
                <td>Tanggal Pembelian</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1}}</td>
                <td>{{ $order->name_customer}}</td>
                <td>
                    <ol>
                        @foreach ($order['medicines'] as $medicine)
                            <li>
                                {{$medicine['name_medicines']}} 
                                (Rp. {{ number_format($medicine['price'],0, ',','.' ) }} ) :
                                Rp. {{ number_format($medicine['sub_price'],0, ',','.' ) }}  
                                <small>qty {{ $medicine['qty'] }}</small></li>
                        @endforeach
                    </ol>
                </td>
                <td>{{ $order['user']['name'] }}</td>
                @php
                setlocale(LC_ALL, 'IND');
                @endphp
                <td>{{Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y')}}</td>
                <td><a href="{{route('kasir.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection