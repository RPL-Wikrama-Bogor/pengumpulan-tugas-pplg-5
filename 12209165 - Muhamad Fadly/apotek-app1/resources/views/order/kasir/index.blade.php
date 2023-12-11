@extends('layouts.template')

@section('content')

<div class="container mt-5">
<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5" style="margin-bottom: -50px;margin-top: 100px">
    <a href="{{ route('kasir.order.create') }}" class="btn btn-primary me-md-5">Tambah pembelian</a>
</div>
<h1>Daftar pembelian</h1>
<form action="{{ route('kasir.order.search') }}" method="get">
    <div class="input-group mb-3" style="width: 400px">
        <input type="date" name="search" class="form-control" placeholder="Cari pembelian..." >
        <button type="submit" class="btn btn-primary btn-lg" style="width: 50px;margin-left:2px">Cari</button>
        <button type="submit" class="kembali" style=" background-color: gray;
        cursor: pointer;margin-left:5px"><a href="{{ route('kasir.order.index') }}" class="btn-black" style="text-decoration: none;color: white;font-size: 20px;">Kembali</a></button>   
    </div>
</form>

    
<table class="table table-bordered table-striped mt-1">
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
        @if (count($orders))
            
        @foreach ($orders as $order)
                <tr>
                    
                    <td class="text-center">{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                    <td class="text-center">{{ $order->name_customer }}</td>
                    <td>
                        <ol>
                            @foreach ( $order['medicines']  as $medicine)     
                                {{$medicine['name_medicine']}} 
                                (RP. {{ number_format($medicine['price'],0,',','.') }} ) : 
                                {{number_format($medicine['sub_price'],0,',','.') }} 
                                <small>quantity{{ $medicine['quantity'] }}</small>
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
                    <td class="text-center"><a href="{{ route('kasir.order.download', $order['id']) }}" class="btn btn-secondary">Unduh PDF</a></td>
                </tr>    
            @endforeach
            @else 
           <tr>
            <div class="alert alert-danger">data tidak dapat ditemukan</div>
           </tr>
            @endif
    </tbody>
</table>
<div class="d-flex justify-content-end mt-5">
    @if ($orders->count())
        {{$orders->links()}}
    @endif
</div>
</div>
@endsection

