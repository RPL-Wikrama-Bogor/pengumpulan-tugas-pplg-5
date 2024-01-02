@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Data Keterlambatan</h1>
    <p class=" mt-[10px]">Home | <span class="font-bold">Data Keterlambatan</span></p>
    <p class=" mt-[10px] mb-[10px]" >Total Terlambat: {{ $latesJumlah }}</p>
</div>

<ul class="nav nav-tabs ml-[300px]" id="myTabs">
<li class="nav-item">
    <a class="nav-link active" id="data-tab" data-bs-toggle="tab" href="#data">Data Keseluruhan</a>
</li>
<li class="nav-item">
    <a class="nav-link" id="rekap-tab" data-bs-toggle="tab" href="#rekap">Rekapitulasi Data</a>
</li>
</ul>

<div class="tab-content ml-[300px]">
<div class="tab-pane fade show active" id="data">
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-3">
        <a href="{{ route('lates.create') }}" class="btn btn-primary me-md-2"><i class="bi bi-plus-circle mr-[5px]"></i>Tambah Data</a>
    </div>
    <form action="{{ route('lates.search') }}" method="get">
        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Cari berdasarkan keterangan.." aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
            <button class="btn btn-primary bg-info" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
            <a href="{{ route('lates.index') }}" class="btn btn-outline-secondary">Reload</a>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keterangan Terlambat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($lates as $item)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['students']['name']}}</td>
                    <td>{{ $item['date_time_late'] }}</td>
                    <td>{{ $item['information'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('lates.edit', $item['id']) }}" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('lates.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-danger" onclick="return confirm('Yakin mau hapus data!')"><i class="bi bi-trash text-white"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tab: Rekapitulasi Data -->
<div class="tab-pane fade" id="rekap">
    <a href="{{ route('lates.export-excel') }}" class="btn bg-success me-md-2 mt-3 text-light"><i class="bi bi-file-earmark-excel mr-[5px]"></i>Export to Excel</a>
    <footer class="blockquote-footer mt-2 mb-2">Hanya bisa mencetak PDF jika<cite title="Source Title"> jumlah keterlambatan 3 atau lebih</cite></footer>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jumlah Keterlambatan</th>  
                <th>Lihat</th>
                <th>Cetak Surat Pernyataan</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                 @php
                     $no = 1; 
                 @endphp
                 @foreach ($groupLates as $nis => $group)
                     @php 
                         $total = $group->where('students.nis')->count();
                     @endphp
                     <tr class="text-center">
                         <td>{{ $no++ }}</td>
                         <td>{{ $nis }}</td>
                         <td>{{ $group->first()->students->name}}</td>
                         <td>{{ $total }}</td>
                         <td>
                             <p><a class="link-offset-2 link-underline link-underline-opacity-0 btn btn-primary" href="{{ route('lates.show', $group->first()->student_id) }}"><i class="bi bi-eye"></i></a></p>
                         </td>
                         <td>
                             @if ($total >= 3)
                                 <a href="{{ route('lates.exportPdf', $group->first()->student_id) }}" class="btn btn-primary"><i class="bi bi-printer"></i></a>
                             @endif
                         </td>
                     </tr>
                 @endforeach
             </tbody>

        </tbody>
    </table>
@endsection
