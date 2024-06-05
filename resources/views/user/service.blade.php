@extends('template.template-user')
@section('content')

<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Layanan</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="services_section_2">
        <div class="row">
                <div class="col-md-4">
                    <div><img src="{{asset('user/assets/images/img-1.png')}}" class="services_img" /></div>
                    <div class="btn_main"><a href="{{Route('job')}}">Pekerjaan</a></div>
                </div>
                <div class="col-md-4">
                    <div><img src="{{asset('user/assets/images/img-1.png')}}" class="services_img" /></div>
                    <div class="btn_main"><a href="{{Route('internship')}}">Magang</a></div>
                </div>
                <div class="col-md-4">
                    <div><img src="{{asset('user/assets/images/img-1.png')}}" class="services_img" /></div>
                    <div class="btn_main"><a href="{{Route('workshop')}}">Workshop</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection