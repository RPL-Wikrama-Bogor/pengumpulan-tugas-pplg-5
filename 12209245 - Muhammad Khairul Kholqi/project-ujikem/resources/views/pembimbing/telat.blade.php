@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">    
    <h1 class="text-[50px] font-bold">Data Keterlambatan</h1>
    <p class=" mt-[10px]">Home | <span class="font-bold">Data Keterlambatan</span></p>
</div>
<ul class="nav nav-tabs ml-[300px] mt-[30px]" id="myTabs">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab"
            aria-controls="simple-tabpanel-0" aria-selected="true">Keseluruhan Data</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab"
            aria-controls="simple-tabpanel-1" aria-selected="false">Rekapitulasi Data</a>
    </li>
</ul>
<div class="tab-content ml-[300px]">
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="table-responsive">
            <form action="{{ route('pembimbing.searchtelat') }}" method="get">
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Cari berdasarkan keterangan.." aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                    <button class="btn btn-primary bg-info" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                    <a href="{{ route('pembimbing.siswa') }}" class="btn btn-outline-secondary">Reload</a>
                </div>
            </form>
            <table class="table table-bordered table-striped mt-3 text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Informasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($latesPs as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ optional($item->students)->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item['date_time_late'])->format('Y-m-d H:i') }}</td>
                            <td>{{ $item['information'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tab: Rekapitulasi Data -->
    <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="table-responsive">
            <a href="{{ route('pembimbing.export-excel') }}" class="btn bg-success me-md-2 mt-3 text-light"><i class="bi bi-file-earmark-excel mr-[5px]"></i>Export to Excel</a>
            <footer class="blockquote-footer mt-2 mb-2">Hanya bisa mencetak PDF jika<cite title="Source Title"> jumlah keterlambatan 3 atau lebih</cite></footer>
            <table class="table table-bordered table-striped mt-3 text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jumlah Keterlambatan</th>
                        <th>Lihat</th>
                        <th>Cetak Surat Pernyataan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @php $processedStudentIds = [] @endphp
                    @foreach ($groupTelat as $nis => $group)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $nis }}</td>
                        <td>{{ $group->first()->students->name }}</td>
                        <td>{{ $group->count() }}</td>
                        <td>
                            <p><a class="link-offset-2 link-underline link-underline-opacity-0 btn btn-primary" href="{{ route('pembimbing.showtelat', $group->first()->student_id) }}"><i class="bi bi-eye"></i></a></p>
                        </td>
                        <td>
                            @if ($group->count() >= 3)
                                <a href="{{ route('pembimbing.pdf', $group->first()->student_id) }}" class="btn btn-primary"><i class="bi bi-printer"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
