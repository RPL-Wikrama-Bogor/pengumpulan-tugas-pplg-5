@extends('layouts.template')

@section('content')

<div class="container mt-5">
<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-bottom: -50px;margin-top: 100px">
    <a href="{{route('admin.order.export-excel')}}" class="btn btn-primary me-md-2">Export Data (excel)</a>
</div>
<form action="{{ route('admin.order.searchadmin') }}" method="get">
    <div class="input-group mb-5" style="width: 400px">
        <input type="date" name="search" class="form-control" placeholder="Cari pembelian..." >
        <button type="button" class="btn btn-primary" style="margin-left: 3px">Cari</button>
        <button type="button" class="btn btn-secondary" style="margin-left: 3px"><a href="{{ route('admin.order.data') }}"></a>Kembali</button>   
    </div>
</form>


<h1>Daftar pembelian</h1>
    
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>pembelian</th>
            <th>Obat</th>
            <th>Total bayar</th>
            <th>kasir</th>
            <th>tanggal pembayaran</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @if(count($orders))
        @foreach ($orders as $order)
                <tr>
                    
                    <td class="text-center">{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                    <td class="text-center">{{ $order->name_customer }}</td>
                    <td>
                        <ol>
                            @foreach ( $order['medicines']  as $medicine)     
                                {{$medicine['name_medicine']}} (RP. {{ number_format($medicine['price'],0,',','.') }} ) : {{number_format($medicine['sub_price'],0,',','.') }} <small>quantity{{ $medicine['quantity'] }}</small>
                           @endforeach
                        </ol>
                    </td>
                    <td class="text-center">Rp. {{ number_format($order['total_price'],0,',','.') }}</td>
                    <td class="text-center">{{ $order['user']['name']}}</td>
                    @php
                        setLocale(LC_ALL,'IND')
                    @endphp
                    {{--carbon : pake bawaan laravel untuk mengatur hal ha yang berkaiyan dengan tipe data date/datetime--}}
                    <td class="text-center">{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td class="text-center"><a href="{{ route('admin.order.download', $order['id']) }}" class="btn btn-secondary">Unduh PDF</a></td>
                </tr>    
            @endforeach
            @else 
           <tr>
            <div class="alert alert-danger">data tidak dapat ditemukan</div>
           </tr>
            @endif
    </tbody>
</table>

<div class="d-flex justify-content-end">
    @if ($orders->count())
        {{$orders->links()}}
    @endif
</div>
</div>  
@endsection

