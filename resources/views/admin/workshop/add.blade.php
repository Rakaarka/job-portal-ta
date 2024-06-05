@extends('template.template-admin')
@section('title', 'Manajemen Workshop')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Form tambah data workshop
            </div>
            <div class="card-body">
                <form method="POST" action="{{Route('addActionWorkshop')}}" id="formAddWorkshop" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Judul Workshop *</label>
                            <input type="text" class="form-control" placeholder="Judul workshop" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal Workshop *</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Mulai Pendaftaran Workshop *</label>
                            <input type="date" class="form-control" placeholder="Judul workshop" name="start_register_date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Akhir Pendaftaran Workshop *</label>
                            <input type="date" class="form-control" name="end_register_date" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Banner Workshop *</label>
                            <input type="file" class="form-control" name="banner" required accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Link contact *</label>
                            <input type="text" class="form-control" placeholder="Link contact" name="contact" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Fokus Pekerjaan *</label>
                            <select class="form-control" name="focus">
                                <option value="" selected>== Pilih salah satu ==</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="Web Developer">Web Developer</option>
                                <option value="Fullstack Web Developer">Fullstack Web Developer</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="IT Consultant">IT Consultant</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi *</label>
                            <textarea name="desc" id="editor" rows="10" cols="80"></textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn btn-success" id="buttonAddWorkshop">Tambah data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    // alert
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('buttonAddWorkshop').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin akan menyimpan data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formAddWorkshop').submit();
                }
            });
        });
    });
</script>

@endsection