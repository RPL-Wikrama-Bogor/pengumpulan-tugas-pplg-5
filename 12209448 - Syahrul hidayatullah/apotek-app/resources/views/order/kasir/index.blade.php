@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('kasir.order.create')}}" class="btn btn-primary">Tambah Pembelian</a>
    </div>
    <div class="justify-content-start"style="margin-left: 50%">
        <form action="/cari" method="POST">
        <input type="date" name="date" class="form-controller">
        <input type="submit" class="form-controller btn btn-success" value="Cari">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    </form>
    
        </div>
    <table class="table table-stripped">
        <thead>
            <tr>
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
        <td>{{ $loop->iteration}}</td>
        <td>{{$order->name_customer}}</td>
        <td>
            <ol>
                @foreach ($order['medicines'] as $medicine)
                <li>
                    {{$medicine['name_medicines']}}
                    (Rp. {{number_format($medicine['price'], 0, ',','.')}}) :
                    (Rp. {{number_format($medicine['sub_price'], 0, ',','.')}}) 
                    <small>qty {{$medicine['qty'] }}</small>

                </li>
                    
                @endforeach
            </ol>
        </td>
        <td>
            {{$order['user']['name'] }}
        </td>
        @php
    setlocale(LC_ALL, 'IND');
        @endphp
        <td>{{Carbon\Carbon::parse($order->created_at)->formatlocalized('%d %B %Y')}}</td>
        <td> <a href="{{route('kasir.order.download-pdf', $order['id']) }}" class="btn btn-secondary">Unduh (.pdf)</a></td>
    </tr>
@endforeach
        </tbody>
        
    </table>
@endsection