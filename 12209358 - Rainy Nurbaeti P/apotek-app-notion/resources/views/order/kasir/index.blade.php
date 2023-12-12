@extends('layouts.template')

@section('content')

    <div class="row">
        <div class="col-md-6 mt-5">
            <form action="{{ route('kasir.order.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ route('kasir.order.search') }}" style="margin-left:5px;"><button class="btn btn-secondary" type="button" >clear</button></a>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="my-5 d-flex justify-content-end">
                <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Tambah pembelian</a>
            </div>
        </div>
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
                            ( Rp.{{ number_format($medicine['price'],0,',','.') }})
                            Rp.{{ number_format($medicine['sub_price'],0,',','.') }}
                            <small>qty {{ $medicine['qty'] }}</small>
                        </li>
                     @endforeach
                    </ol>
                </td>
                <td>{{ $order['user'] ['name'] }}</td>
                {{--  carbon: package bawaan laravel untuk
                 mengatur halhal yang berkaitan dengan tope data date/time--}}
                @php
                //setting lokal time sbgai wilayah indonesia
                setlocale(LC_ALL, 'IND');
                @endphp
                {{--untuk memanipulasi isi karbon--}}
                <td>{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                <td> <a href="{{ route('kasir.order.downlod-pdf',$order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($orders->count())
            {{ $orders->links() }}
        @endif
  @endsection
