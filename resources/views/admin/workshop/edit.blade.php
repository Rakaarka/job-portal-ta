@extends('template.template-admin')
@section('title', 'Manajemen Workshop')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Form edit data workshop
            </div>
            <div class="card-body">
                <form method="POST" action="{{Route('editActionWorkshop')}}" id="formEditWorkshop" enctype="multipart/form-data">
                    @csrf
                    <input type="string" value="{{$data->id_workshop}}" name="id_workshop" hidden>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Judul Workshop *</label>
                            <input type="text" class="form-control" placeholder="Judul workshop" name="title" required value="{{$data->title}}">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal Workshop *</label>
                            <input type="date" class="form-control" name="date" required value="{{$data->date}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Mulai Pendaftaran Workshop *</label>
                            <input type="date" class="form-control" placeholder="Judul workshop" name="start_register_date" value="{{$data->start_register_date}}">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Akhir Pendaftaran Workshop *</label>
                            <input type="date" class="form-control" name="end_register_date" required value="{{$data->end_register_date}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Banner Workshop</label>
                            <br>
                            <small>Kosongi apabila tidak diubah</small>
                            <input type="file" class="form-control" name="banner" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Link contact *</label>
                            <input type="text" class="form-control" placeholder="Link contact" name="contact" required value="{{$data->contact}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Fokus Pekerjaan *</label>
                            <select class="form-control" name="focus">
                                <option value="" selected>== Pilih salah satu ==</option>
                                <option value="Data Analyst" @if($data->focus == "Data Analyst") selected @endif>Data Analyst</option>
                                <option value="Web Developer" @if($data->focus == "Web Developer") selected @endif>Web Developer</option>
                                <option value="Fullstack Web Developer" @if($data->focus == "Fullstack Web Developer") selected @endif>Fullstack Web Developer</option>
                                <option value="Frontend Developer" @if($data->focus == "Frontend Developer") selected @endif>Frontend Developer</option>
                                <option value="Backend Developer" @if($data->focus == "Backend Developer") selected @endif>Backend Developer</option>
                                <option value="IT Consultant" @if($data->focus == "IT Consultant") selected @endif>IT Consultant</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi *</label>
                            <textarea name="desc" id="editor" rows="10" cols="80">{!!$data->desc!!}</textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn btn-success" id="buttonEditWorkshop">Update data</button>
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
        document.getElementById('buttonEditWorkshop').addEventListener('click', function() {
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
                    document.getElementById('formEditWorkshop').submit();
                }
            });
        });
    });
</script>

@endsection