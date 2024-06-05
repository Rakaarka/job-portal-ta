@extends('template.template-admin')
@section('title', 'Manajemen Workshop')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Detail workshop
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <img style="padding: 0.5em;" src="{{Storage::url($data->banner)}}" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="data-detail">
                            <div class="card">
                                <div class="card-header">
                                    Data Workshop
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Judul</th>
                                                <td>:</td>
                                                <td>{{$data->title}}</td>
                                            </tr>
                                            <tr>
                                                <th>Fokus</th>
                                                <td>:</td>
                                                <td>{{$data->focus}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Pelaksanaan</th>
                                                <td>:</td>
                                                <td>{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Pendaftaran</th>
                                                <td>:</td>
                                                <td>{{ \Carbon\Carbon::parse($data->start_register_date)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($data->end_register_date)->format('d-m-Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td>:</td>
                                                <td><a href="{{$data->contact}}">{{$data->contact}}</a></td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Deskripsi : </th>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    {!!$data->desc!!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection