@extends('layouts.template')

@section('content')
<form method="get" action="{{ route('kasir.order.search') }}" class="mb-4">
       <div class="form-group">
           <label for="searchDate">Cari Berdasarkan Tanggal:</label>
           <input type="date" id="searchDate" name="searchDate" class="form-control">
           <button type="submit" class="btn btn-info mt-2">Cari</button>
       </div>
   </form>
   <div class="my-5 d-flex justify-content-end">
     <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Tambah pembelian</a>
   </div>
    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th>NO</th>
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
                {{ $order['name_costumer'] }} </td>
                <td>
                    {{-- nested loop: di dalam looping ada luping --}}
                    {{-- karna column medicine tipe datanya berbentuk array json maka untuk mengaksesnya perlu di looping jg --}}
                    <ol>
                        @foreach($order['medicinies'] as $medicine)
                        <li>
                            {{-- hasil yang di inginkan : --}}
                            {{-- 1.nama obat (rp.3000) : Rp.1500 qty 5 --}}
                            {{ $medicine['name_medicine'] }}
                            ( Rp.{{ number_format($medicine['price'],0,',','.') }})
                            Rp.{{ number_format($medicine['sub_price'],0,',','.') }}
                            <small>qty {{ $medicine['qty'] }}</small>
                        </li>
                     @endforeach
                    </ol>
                </td>
                <td>{{ $order['user']['name'] }}</td>
                @php
                    setlocale(LC_ALL,'IND');
                @endphp
                <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                <td> <a href="{{ route('kasir.order.download', $order['id']) }}" class="btn btn-scondary">Unduh (.pdf)</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @endsection