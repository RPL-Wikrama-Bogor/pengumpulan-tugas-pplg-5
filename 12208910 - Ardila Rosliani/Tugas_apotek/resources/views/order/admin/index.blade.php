@extends('layouts.template')

@section('content')
   <div class="my-3 d-flex justify-content-end">
     <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">Export Data (excel)</a>
   </div>
   <form class="form my-2" method="GET" action="{{ route('admin.order.data') }}">
    {{-- @csrf --}}
    <input type="date" name="query" class="form-control w-25 d-inline">
    <button type="submit" class="btn btn-primary mb-1">Cari</button>
    <a href="{{ route('admin.order.data') }}" class="btn btn-primary">Kembali</a>
</form>
    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
                <th>obat</th>
                <th>kasir</th>
                <th>tanggal pembelian</th>
                <th>aksi</th>

            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
         <tr>
            <td>
                {{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}
            </td>
            <td>
                {{ ($order->name_customer) }} </td>
                <td>
                    {{-- nested loop: di dalam looping ada luping --}}
                    {{-- karna column medicine tipe datanya berbentuk array json maka untuk mengaksesnya perlu di looping jg --}}
                    <ol>
                        @foreach($order['medicines'] as $medicine)
                        <li>
                            {{-- hasil yang di inginkan : --}}
                            {{-- 1.nama obat (rp.3000) : Rp.1500 qty 5 --}}
                            {{ $medicine['name_medicine'] }}
                            (Rp.{{ number_format($medicine['price'],0,',','.') }})
                            Rp.{{ number_format($medicine['sub_price'],0,',','.') }}
                            <small>qty {{ $medicine['qty'] }}</small>
                        </li>
                     @endforeach
                    </ol>
                </td>
                <td>{{ $order['user']['name'] }}</td>
                @php
                // setting lokal time sebagai wilayah indonesia
                    setlocale(LC_ALL, 'IND');
                @endphp
                {{-- Carbon pakage untuk memanipulasi tanggal --}}
                <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                <td> <a href="{{ route('admin.order.simpan',$order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @endsection