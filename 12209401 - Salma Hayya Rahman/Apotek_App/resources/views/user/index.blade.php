@extends('layouts.template')

@section('content')
@if (Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if (Session::get('deleted'))
    <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
<form action="{{ route('user.create') }}" method="get">
    <button type="submit" class="btn btn-primary mt-3 mb-4 float-end" >Tambah Pengguna</button>
</form>
<table class="table table-bordered table-striped mt-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody>
            @php $no = 1; @endphp
            @foreach ($user as $item)
                <tr>
                    <td>{{ ($user ->currentpage()-1) * $user ->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
                    <td class="d-flex">
                        {{-- kalau path parameternya lebih dari satu : route('medicine.edit' , ['paraml' =>isi1, 'param2' =>$isi2]) --}}
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-2" style="width: 2.5rem; height: 2rem;"><i class="fa-solid fa-pen-to-square"></i></a>

                        <div class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#deleted" onclick="deleted({{ $item['id'] }})">
                        <i class="fa-solid fa-trash"></i></div>
                    </td>
                </tr>
                <!-- Add a hidden input field to store the user ID for the modal -->
                <input type="hidden" id="user_id_{{ $item['id'] }}" value="{{ $item['id'] }}">
            @endforeach
        </tbody>
</table>
<div class="d-flex justify-content-end">
    @if ($user->count())
        {{ $user->links()}}
    @endif
</div>
<div class="modal" id="deleted" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form id="delete-user-form" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
    function deleted(userId) {
        // Get the user ID from the hidden input field
        const user_id = document.getElementById('user_id_' + userId).value;
        
        // Set the user ID in the modal form action URL
        const modalForm = document.getElementById('delete-user-form');
        modalForm.action = "{{ route('user.delete', ':user_id') }}".replace(':user_id', user_id);
    }
    $(function () {
    if (sessionStorage.reloadAfterPageLoad) {
        $('#msg-success').attr("class", "alert alert-danger");
        $('#msg-success').text("Data Berhasil Dihapus");
        sessionStorage.clear();
    }
});
</script>

