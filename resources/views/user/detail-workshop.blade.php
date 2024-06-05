@extends('template.template-user')
@section('content')
<div class="contact_section layout_padding">
    <div class="container">
        <h1 class="contact_taital">{{$data->title}}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{Storage::url($data->banner)}}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-6">
                <table class="table table-responsive table-striped">
                    <tr>
                        <th>Mulai Pendaftaran</th>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($data->start_register_date)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Akhir Pendaftaran</th>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($data->end_register_date)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Pelaksanaan</th>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Fokus</th>
                        <td>:</td>
                        <td>{{ $data->focus }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="{{$data->contact}}" class="btn btn-primary">Daftar</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>{!!$data->desc!!}</p>
            </div>
        </div>
    </div>
</div>

@endsection