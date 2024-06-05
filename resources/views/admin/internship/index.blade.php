@extends('template.template-admin')
@section('title', 'Manajemen Internship')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Manajemen Internship
            </div>
            <div class="card-body">
                <a type="button" href="{{Route('formAddInternship')}}" class="mb-3 btn btn-primary">Tambah Internship</a>
                <form action="" method="GET" class="mb-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan Nama . . ." name="search" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-scrollable">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Pelaksanaan</th>
                                <th scope="col">Pendaftaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $data->firstItem() + $loop->index }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($item->end_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->start_register_date)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($item->end_register_date)->format('d-m-Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{Route('detailInternship', ['id' => $item->id_internship])}}" class=" btn btn-warning"><i class="ti ti-info-circle-filled"></i></a>
                                        <a href="{{Route('formEditInternship', ['id' => $item->id_internship])}}" class=" btn btn-success"><i class="ti ti-edit"></i></a>
                                        <a data-id="{{ $item->id_internship }}" onclick="confirmDeleteInternship(event)" type="button" class="btn btn-danger"><i class="ti ti-trash-x-filled"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function confirmDeleteInternship(event) {
        event.preventDefault();
        const id = event.currentTarget.getAttribute('data-id');
        console.log(id);
        const url = "{!! url('administrator/internship/delete-action') !!}";
        console.log(url);
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url + "/" + id;
            }
        });
    }
</script>
@endsection