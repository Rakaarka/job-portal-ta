@extends('template.template-user')
@section('content')
<div class="contact_section layout_padding">
    <div class="container">
        <h1 class="contact_taital">Magang</h1>
        <form method="GET">
            @csrf
            <div class="row mb-5">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Cari berdasarkan judul" name="title">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="daterange" name="daterange" placeholder="Start date - End date" value="null">
                </div>
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach($datas as $data)
            <div class="col-md-4">
                <div class="card" style="border-radius: 20px;">
                    <img src="{{Storage::url($data->banner)}}" style="border-radius: 20px;" class="card-img-top" alt="...">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title">{{$data->title}}</h5>
                        <br>
                        <span class="badge rounded-pill text-bg-success"><b>{{$data->focus}}</b></span>
                        <br>
                        <p class="card-text">
                            Pendaftaran : <br>
                            {{ \Carbon\Carbon::parse($data->start_register_date)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($data->end_register_date)->format('d-m-Y') }}
                        </p>
                        <a href="{{Route('detailInternshipUser', ['id' => $data->id_internship])}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection