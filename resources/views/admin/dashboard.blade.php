@extends('template.template-admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<div class="container">
    <div class="row ">
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-orange">
                <a href="{{ Route ('indexWorkshop') }}">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-building"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0 card-title-dashboard">Jumlah Workshop</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 card-desc-dashboard">
                                    {{$countWorkshop}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cyan">
                <a href="{{ Route ('indexInternship') }}">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0 card-title-dashboard">Jumlah Internship</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 card-desc-dashboard">
                                    {{$countInternship}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card l-bg-green">
                <a href="{{ Route ('indexJob') }}">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-image"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0 card-title-dashboard">Jumlah Pekerjaan</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 card-desc-dashboard">
                                    {{$countJob}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection