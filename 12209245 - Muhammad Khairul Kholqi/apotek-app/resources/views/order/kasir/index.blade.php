@extends('layouts.template')

@section('content')
    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
    </div>
    <form action="{{ route('kasir.order.search') }}" method="get">
        <div class="input-group mb-5" style="width: 400px">
            <input type="date" name="search" class="form-control">
            <button type="submit" class="btn btn-outline-secondary badge bg-primary text-wrap" style="width: 50px">Search</button>
            <button type="submit" class="btn btn-outline-secondary badge bg-primary text-wrap bg-warning" style="width: 50px; margin-left: 10px; border-radius: 0; padding: 5px; border: none"><a href="{{ route('kasir.order.index') }}"></a>Return</button>
        </div>
    </form>
    <div style="margin-bottom: 50px; margin-top: -30px">
        <h2>Daftar Pembelian Obat🤒</h2>
    </div>
    <table class="table table-striped table-bordered" style="border: 1px solid #000">
        <thead>
            <tr class="text-center">
                <th class="bg-info text-white">No</th>
                <th class="bg-info text-white">Pembelian</th>
                <th class="bg-info text-white">Obat</th>
                <th class="bg-info text-white">Kasir</th>
                <th class="bg-info text-white">Tanggal Pembelian</th>
                <th class="bg-info text-white">Aksi</th>
            </tr>
        </thead>
        <tbody> 
            @if (count($orders))
                
            @foreach ($orders as $order)
                <tr>
                    <td class="text-center">{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                    <td class="text-center">{{ $order->name_customer }}</td>
                    <td>
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                <li>{{ $medicine['name_medicine'] }} 
                                (Rp. {{ number_format($medicine['price'], 0, ',', '.') }}) : 
                                Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }}
                                <small>quantity{{ $medicine['qty'] }}</small></li>
                            @endforeach
                        </ol>
                    </td>
                    <td class="text-center">{{ $order['user']['name'] }}</td>
                    @php 
                        setlocale(LC_ALL, 'IND');
                    @endphp
                    <td class="text-center">{{ Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td class="text-center"><a href="{{ route('kasir.order.download', $order['id']) }}" class="btn btn-secondary bg-success">Unduh PDF</a></td>
                </tr>    
            @endforeach

            @else 
            <tr>
                <p class="alert alert-danger">Data tidak ada!</p>
            </tr>
            @endif        

        </tbody>
    </table>
       <div class="d-flex justify-content-end mb-5 mt-4">
        @if($orders->count())
            {{ $orders->links() }}
        @endif
    </div>
@endsection