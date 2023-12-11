@extends('layouts.template')

@section('content')
<div class="mt-3">
    <div class="my-5 d-flex ">
        <form action="{{ route('admin.order.data') }}" method="GET">
            <input type="date" name="query" placeholder="Cari...">
            <button type="submit" class="btn btn-info" ><ion-icon name="search-outline"></ion-icon></button>
            <a href="{{ route('admin.order.data') }}" class="btn btn-secondary"><ion-icon name="refresh-outline"></ion-icon></a>  
            
        </form>
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-success" style="margin-left: 700px;">Export Data (.xlsx)</a>
    </div>
   
    <table class="table table-stripped table-bordered table-hover">
        <thead>
            <th>No</th>
            <th>Pembeli</th>
            <th>Obat</th>
            <th>Price</th>
            <th>Kasir</th>
            <th>Tanggal Pembelian</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($orders as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name_customer }}</td>
                
                    {{--nested loop : didalam looping ada looping--}}
                    {{--karna column medicines tipe datama array json, maka untuk mengaksesnya perlu dilooping jg--}}
                {{-- <td class="text-center">{{ $no++ }}</td>
                <td>{{ $item['name_customer'] }}</td> --}}
                <td>
                    <ol>
                    @foreach ($item['medicines'] as $medicine)
                    
                        <li>
                            {{ $medicine['name_medicine'] }} { {{ number_format($medicine['price'], 0, ',', '.') }} }
                            : Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>qty {{ $medicine['qty'] }}</small>
                        </li>
                    
                    @endforeach
                    </ol>
                </td>
                <td>Rp. {{ number_format($item['total_price'], 0, ',', '.') }}</td>
                <td>{{ $item['user']['name'] }}</td>
                @php
                //setting localtime jadi wilayah indo
                    setLocale(LC_ALL, 'IND');
                @endphp
                {{--carbon package bawaan laravel untuk mengatur hal-hal yg berkaitan dengan tipe data date/datetime--}}
                <td>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</td>
                <td><a href="{{ route('admin.order.unduh', $item['id'])}}" class="btn btn-danger">Unduh (.pdf)</a></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-end">
        @if ($orders->count())
            {{ $orders->links() }}
        @endif
    </div> --}}
</div>
@endsection