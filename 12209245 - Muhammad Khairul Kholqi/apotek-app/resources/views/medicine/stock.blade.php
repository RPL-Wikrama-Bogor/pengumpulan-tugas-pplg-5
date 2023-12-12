@extends('layouts.template')

@section('content')
    {{-- menampilkan alert success dari query ajax --}}
    <div id="msg-success"></div>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
            <tr class="text-center">
                <td>{{( $medicines->currentpage()-1) * $medicines->perpage() + $loop->index + 1}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['stocks']}}</td>
                <td class="d-flex justify-content-center" >
                    <div class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#tambah-stock" onclick="edit({{$item['id']}})">Tambah Stock</div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if($medicines->count())
            {{$medicines->links()}}
        @endif
    </div>

    {{-- modal --}}
    <div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah data stock</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                {{-- menyimpan alat denger --}}
                <div id="msg"></div>
                <div>
                    <label for="name" class="form-label">Nama Obat :</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div>
                    <label for="stocks" class="form-label">Stock :</label>
                    <input type="number" name="stocks" id="stocks" class="form-control">
                </div>
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function edit(id) {
        let url = "{{ route('medicine.show', ':id') }}".replace(':id', id);

        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (res) {
                $('#tambah-stock').modal('show'); 
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#stocks').val(res.stocks);
            }
        });
    }
        // ketika el html id tambah-stock 
        $("#tambah-stock").submit(function(e) {
            e.preventDefault();
            
            let id = $('#id').val();
            let url = "{{ route('medicine.stock.update', "id") }}";
            url = url.replace("id", id);

            let data = {
                stock: $("#stocks").val(),
            };
            $.ajax({
                // type disamakan dengan route
                type: "PATCH",
                // kirim route 
                url: url,
                // kirim data Reuset $request
                data: data,
                cache: false,
                // kalau berhasil
                success: function(res){
                    $("#tambah-stock").modal('hide');
                    // set session storage ( penyimpanan browser sementara)
                    sessionStorage.reloadAfterPageLoad = true;

                    window.location.reload();
                },
                error: function(err){
                    $('#msg').attr("class", "alert alert-danger");
                    
                    $('#msg').text(err.responseJSON.message);
                }
            })
        });
        // function tanpa nama di jalankan ketika web barus selesai reload
        $(function() {
            // kalo di session js nya ada property reloadAfterPageLoad
            if(sessionStorage.reloadAfterPageLoad) {
                // tambah class alert di id="msg-success"
                $('#msg-success').attr("class", "alert alert-success");
                // isi text di alertnya
                $('#msg-success').text("berhasil menambahkan data stock");
                // hapus session js tersebut agar alert hanya muncul setelah reload update data 
                sessionStorage.clear();
            }
        })
    </script>
@endpush 












