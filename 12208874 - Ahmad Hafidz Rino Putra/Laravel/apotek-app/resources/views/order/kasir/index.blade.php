 @extends('layouts.template')

 @section('content')
     <div class="container mt-3">
         <div class="row">
             <div class="col-md-6 mt-5">
                <form action="{{ route('kasir.order.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                        <button class="btn btn-primary" type="submit">Search</button>
                        <a href="{{ route('kasir.order.search') }}"><button type="submit" class="btn btn-secondary">Refresh</button></a>
                    </div>
                </form>
             </div>
             <div class="col-md-6">
                 <div class="my-5 d-flex justify-content-end">
                     <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
                 </div>
             </div>
         </div>
         <table class="table table-striped table-bordered table-hover"
             style="font-weight: normal; border: 2px solid black;">
             <thead>
                 <th class="text-center">No</th>
                 <th>Pembeli</th>
                 <th>Obat</th>
                 <th>Total Bayar</th>
                 <th>Tanggal Beli</th>
                 <th>Kasir</th>
                 <th></th>
             </thead>
             <tbody>
                 @php
                     $no = 1;
                 @endphp
                 @foreach ($orders as $item)
                     <tr>
                         <td class="text-center">{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}
                         </td>
                         <td>{{ $item['name_customer'] }}</td>
                         <td>
                             @foreach (json_decode($item['medicines'], true) as $medicine)
                                 <ul>
                                     <li>
                                         {{ $medicine['name_medicine'] }}
                                         ({{ number_format($medicine['price'], 0, ',', '.') }})
                                         :
                                         Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>=
                                             {{ $medicine['qty'] }}</small>
                                     </li>
                                 </ul>
                             @endforeach
                         </td>
                         <td>
                             Rp. {{ number_format($item['total_price'], 0, ',', '.') }}
                         </td>
                         @php
                             setlocale(LC_ALL, 'IND');
                         @endphp
                         <td>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</td>
                         <td>{{ $item['user']['name'] }}</td>
                         <td>
                             <a href="{{ route('kasir.order.download', $item['id']) }}" class="btn btn-secondary">Download
                                 Setruk</a>
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
     </div>
 @endsection
