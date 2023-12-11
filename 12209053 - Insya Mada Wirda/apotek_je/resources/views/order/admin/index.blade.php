@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mt-5">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="date" name="search" id="" class="form-control" value="{{ request()->search }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="my-5 d-flex justify-content-end">
                    <a href="{{ route('admin.order.export-Excel') }}" class="btn btn-primary">Export Data(Excel)</a>
                </div>
            </div>
        </div>
        <table class="table table-stripped table-bordered">
            <thead>
                <th>No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Price</th>
                <th>Kasir</th>
                <th>Tanggal Beli</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($orders as $item)
                    <tr>
                        <td class="text-center">{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                        <!-- <td>{{ $item['name_customer'] }}</td> -->
                        <td>
                            {{ ($item->name_costumer) }}
                        </td>
                            <td>
                                <ol>
                                    @foreach ($item['medicinies'] as $medicine)
                                        <li>{{ $medicine['name_medicine'] }}
                                            (Rp.{{ number_format($medicine['price'], 0, ',', '.') }})
                                             Rp.{{ number_format($medicine['sub_price'], 0, ',', '.') }} 
                                             <small>qty {{ $medicine['qty'] }}</small></li>
                                    @endforeach
                                </ol>
                            </td>
                        <td>Rp{{ number_format($item['total_price'], 0, ',', '.') }}</td>
                        <td>{{ $item['user']['name'] }}</td>
                        @php
                            setlocale(LC_ALL, 'IND')
                        @endphp
                        <td>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</td>
                        {{-- <td>{{ $item['created_at']->format('d - F - Y') }}</td> --}}
                        <td><a href="{{ route('admin.order.export-Excel') }}?id={{$item->id}}" class="btn btn-secondary">Unduh(.exc)</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            @if ($orders->count())
                {{ $orders->links() }}
            @endif
        </div>
    </div>
@endsection