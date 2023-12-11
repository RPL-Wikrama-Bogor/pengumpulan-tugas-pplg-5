@extends('layouts.template')
@section('content')
<div class="mt-5 d-flex justify-content-between">
    <div class="mt-3 mb-3">
<form action="{{route('admin.order.data')}}" method="get" class="d-flex">
<div class="input-group">
    <input type="date" name="search_date" class="form-control">
    <button type="submit" class="btn btn-primary">Cari</button>
</div>
</form>
</div>
<div class="input-group-append">
    <a href="{{ route('admin.order.exportexcel')}}" class="btn btn-primary float-right">Export data(excel)</a>
</div>
</div>
<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>#</th>
            <th>pembeli</th>
            <th>obat</th>
            <th>Kasir</th>
            <th>Tanggal pembelian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
                <tr>
                    <td>{{($orders->currentpage()-1)*$orders->perpage()+$loop->index + 1}}</td>
                    <td>{{$order['name_customer']}}</td>
                    <td>
                        <ol>
                            @foreach($order['medicines'] as $medicine)
                            <li>{{ $medicine['name_medicines']}} (RP.{{ number_format($medicine['price'],0,',')}}):RP.{{ number_format($medicine['sub_price'],0,',')}}
                                <small>Jumlah :{{ $medicine['qty']}}</small></li>
                            @endforeach
                        </ol>
                    </td>
                    <td>{{$order['user']['name']}}</td>
                    @php
                    setlocale(LC_ALL,'IND')
                    @endphp
                    <td>{{ Carbon\Carbon::parse($order->create_at)->formatlocalized('%d %b %y')}}</td>
                    <td> <a href="{{ route('kasir.order.download',$order['id'])}}" class="btn btn-secondary">Unduh(.pdf)</a></td>
                </tr>
        @endforeach
    </tbody>
</table>
    
@endsection