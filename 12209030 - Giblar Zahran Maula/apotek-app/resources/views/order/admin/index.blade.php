@extends('layouts.template')

@section('content')
    {{-- <div class="mt-5 d-flex justify-content-end">
        <a href="{{  }}" class="btn btn-primary">export data(excel) </a>
        
        <form action="{{  }}" method="GET" class="ml-3">
            <input type="date" name="search_date" class="input input-date">
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div> --}}


    {{-- ggggg  --}}
    <div class="mt-5 d-flex align-items-center">
        <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary">unduh dalam bentuk excel</a>
        
    </div>
<form action="{{ route('admin.order.search') }}" method="GET" class="">
            <div class="input-group mb-3">
                <input type="date" name="search_date" class="form-control">
                <button type="submit" class="btn btn-outline-secondary"><img src="{{ asset('image/transp.png') }}" alt="refresh"></button>
            
        </form>
        <a href="{{ route('admin.order.index') }}" class="btn btn-outline-secondary"><img src="{{ asset('image/reff.png') }}" alt="refresh"></a>
    </div>
{{-- jjjjj --}}

    <table class="table table-striped">
        <thead>
            <tr>
                <th>pembeli</th>
                <th>obat</th>
                <th>total bayar</th>
                <th>kasir</th>
                <th></th>
            </tr>   
        </thead>
        <tbody>
            @php
                $no = 1 ;
            @endphp
            @foreach ($orders as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ ($orders->currentpage()-1 * $orders->perpage() + $loop->index + 1)}}</td>
                    <td>{{ $item['name_customer'] }}</td>
                    <td>
                        @if (is_iterable($item['medicines']))
                        @foreach ($item['medicines'] as $medicine)
                            <ol>
                                <li>
                                    {{ $medicine['name_medicine'] }} ( {{ number_format($medicine['price'], 0, ',',',') }} ): Rp. {{ number_format ($medicine['sub_price'], 0, ',',',')}} <small> qty {{ $medicine['qty'] }}</small>
                                </li>
                            </ol>
                        @endforeach
                        @endif
                    </td>
                    <td>Rp. {{ number_format($item['total_price'], 0, ',',',' ) }}</td>

                    <td>{{ $item['user']['name'] }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y')  }}</td>
                    <td>
                        <a href="{{ route('cashier.order.download', $item['id']) }}" class="btn btn-secondary">download setruk</a>
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