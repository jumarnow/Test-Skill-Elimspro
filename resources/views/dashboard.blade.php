@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            <i class='fa fa-home'></i> &nbsp;&nbsp;Dashboard
        </h1>
    </section>

    <section id='content_section' class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Company</span>
                        <span class="info-box-number">{{ $jumlahCompany }}</span>
                    </div>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Employees</span>
                        <span class="info-box-number">{{ $jumlahEmployees }}</span>
                    </div>

                </div>

            </div>

    </section>
@endsection
