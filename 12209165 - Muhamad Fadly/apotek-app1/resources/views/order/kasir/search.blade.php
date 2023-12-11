
@extends('layouts.template')

@section('content')

<div id="back-wrap" style="margin: 30px auto 0 auto;width: 100px;display: flex;justify-content: flex-end;margin-right:30px;margin-top: 40px">
    <button type="submit" class="kembali" style=" background-color: gray;
    cursor: pointer;"><a href="{{ route('kasir.order.index') }}" class="btn-black" style="text-decoration: none;color: white;font-size: 20px;">Kembali</a></button>   
</div>
<div class="container mt-3">
    <h3>Search Results</h3>

    @if ($order->count() > 0)
    <table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>pembelian</th>
            <th>Obat</th>
            <th>Total bayar</th>
            <th>kasir</th>
            <th>tanggal pembayaran</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($order as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item['name_customer'] }}</td>
            <td>
                @foreach ( $item['medicines']  as $medicine)     
            <ol>
            <li>
                {{$medicine['name_medicine']}} ( {{ number_format($medicine['price'],0,',','.') }} ) : Rp. {{number_format($medicine['sub_price'],0,',','.') }} <small>quantity{{ $medicine['quantity'] }}</small>
            </li>
           </ol>
           @endforeach
        </td>
        <td>Rp. {{ number_format($item['total_price'],0,',','.') }}</td>
        <td>{{ $item['user']['name']}}</td>
        <td>{{ $item['created_at']}}</td>
        <td><a href="{{ route('kasir.order.download', $item['id']) }}" class="btn btn-secondary">download srtuk</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

        <div class="d-flex justify-content-end">
            {{ $order->links() }}
        </div>
    @else
        <p>No results found.</p>
    @endif
</div>

@endsection
