@extends('layouts.template')

@section('content')
    <div class="mt-5 d-flex align-items-center">
        <a href="{{ route('cashier.order.create') }}" class="btn btn-primary">tambah pembelian</a>
        
        
    </div>
<form action="{{ route('cashier.order.search') }}" method="GET" class="">
            <div class="input-group mb-3">
                <input type="date" name="search_date" class="form-control">
                <button type="submit" class="btn btn-outline-secondary"><img src="{{ asset('image/transp.png') }}" alt="refresh"></button>
            
        </form>
        <a href="{{ route('cashier.order.index') }}" class="btn btn-outline-secondary"><img src="{{ asset('image/reff.png') }}" alt="refresh"></a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>no</th>
                <th>pembelian</th>
                <th>test</th>
                <th>total</th>
                <th>kasir</th>
                <th>tanggal pembelian</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($orders as $item)
                <tr>

                    <td>{{ $orders->currentpage() - 1 * $orders->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name_customer'] }}</td>
                    <td>
                        @if (is_iterable($item['medicine']))
                        {{ dd($item['medicine']) }}
                            <ul>
                                @foreach ($item['medicines'] as $medicine)
                                <li>{{ $medicine['name_medicine'] }} 
                                (Rp. {{ number_format($medicine['price'], 0, ',', '.') }}) : 
                                Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                                <small>qty{{ $medicine['qty'] }}</small></li>
                            @endforeach

                            </ul>
                        @endif
                    </td>
                    
                    <td>Rp. {{ number_format($item['total_price'], 0, ',', ',') }}</td>

                    <td>{{ $item['user']['name'] }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td>
                        <a href="{{ route('cashier.order.download', $item['id']) }}" class="btn btn-secondary">download
                            setruk</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">

        @if ($orders->count())
            {{ $orders->links() }}
        @endif
    </div>
@endsection
