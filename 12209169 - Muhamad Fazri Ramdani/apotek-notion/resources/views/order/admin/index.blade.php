@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">Export Data</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Kasir</th>
                  <td>Tanggal Pembelian</td>
                <th>Aksi</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
               <tr>
                <td>{{ ($orders->currentpage()-1)* $orders->perpage() + $loop->index + 1 }}</td>
                <td>{{ $order->name_customer }}</td>
                <td>
                    {{--nested loop : didalam looping ada looping--}}
                    {{--karna column medicines tipe data nya berbentuk array json, maka untu mengaksesnya perlu di looping jg--}}
                    <ol>
                        @foreach ($order['medicines'] as $medicine)
                        <li>
                            {{--hasil yang di iinginkan :--}}
                            {{--1. nama obat (Rp. 3000) : Rp. 15000 qty 5 --}}
                            {{ $medicine['name_medicines'] }}
                            ( Rp. {{ number_format($medicine['price'], 0, ',', '.')}}) :
                            Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                            <small>qty {{ $medicine['qty'] }}</small>
                        </li>
                        @endforeach
                    </ol>
                </td>
                <td>{{ $order['user']['name']}}</td>
                {{--       --}}
                @php
                // setting local time sebagai wilayah indonesia 
                setlocale(LC_ALL, 'IND');
                @endphp
                <td>{{ Carbon\Carbon::parse($order->created_at) ->formatLocalized('%d %B %Y') }}</td>
                <td>
                    <a href="{{ route('kasir.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection