@extends('layouts.template')

@section('content')
<div class="my-5 d-flex justify-content-end">
    <a href="{{ route('admin.order.export-excel') }}" class="btn btn-primary"><i class="fa-solid fa-file-export"></i> (excel)</a>
</div>
<form action="{{ route('admin.order.searchAdmin') }}">
    <div class="d-flex rounded-3" role="search">
        <form action="{{ route('admin.order.searchAdmin') }}" method="GET" class="d-flex">
          <input type="date" name="search" id="search" class="form-control me-2 rounded-3 shadow-sm" role="search" style="cursor: pointer">
          <button type="submit" class="btn btn-outline-secondary badge bg-primary text-wrap rounded-3 shadow-sm" style="width: 50px" aria-label="Search">
            <i class="fas fa-search"></i>
          </button>
          <button type="button" class="btn btn-outline-secondary btn-reset rounded-3 shadow-sm" onclick="resetForm()" aria-label="Reset">
            <i class="fa-solid fa-reply"></i>
          </button>
        </form>
      </div>
  </form>
  <br>
  <table class="table table-striped table-bordered rounded-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Pembeli</th>
            <th>Obat</th>
            <th>Kasir</th>
            <th>tanggal Pembelian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (count($orders) > 0)
        @php $no = 1; @endphp
        @foreach($orders as $item)
            <tr>
                <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}</td>
                <td>{{ $item['name_customer'] }}</td>
                <td>
                    <ol>
                        @foreach($item['medicines'] as $medicine)
                            <li>
                                {{ $medicine['name_medicines'] }} ( {{ number_format($medicine['price'], 0, ',', '.') }} ) : Rp.
                                {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>Qty {{ $medicine['qty'] }}</small>
                            </li>
                        @endforeach
                    </ol>
                </td>
    
                <td>{{ $item['user']['name'] }}</td>
                <td>
                    @php
                        setlocale(LC_ALL, 'id_ID');
                    @endphp
                    {{ Carbon\Carbon::parse($item['created_at'])->formatLocalized('%d %B %Y') }}
                </td>
                <td>
                    <a href="{{ route('admin.order.download-pdf', $item->id) }}" class="btn btn-secondary"><i class="fa-solid fa-download"></i> (pdf)</a>
                </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">
                <p class="alert alert-danger">Data tidak ditemukan!</p>
            </td>
        </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end">
    @if ($orders->count())
    {{ $orders->links() }}
    @endif
</div>
<script>
    function resetForm() {
        // Ganti URL dengan URL tujuan setelah tombol reset ditekan
        window.location.href = "{{ route('admin.order.data') }}";
    }
    </script>
@endsection