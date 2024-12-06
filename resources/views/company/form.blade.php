@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            <i class='fa fa-money'></i> &nbsp;&nbsp;{{ isset($company) ? 'Edit' : 'Create' }} Company
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Halaman Awal</a></li>
            <li class="active">{{ isset($company) ? 'Edit' : 'Create' }} Company</li>
        </ol>
    </section>

    <section id="content_section" class="content">

        <div class="row" style="margin-bottom: 10px">
            <div class="col-sm-6">
                <div style="padding-top: 5px">
                    <p><a title="Return" href="{{ route('company.index') }}">
                            <i class="fa fa-chevron-circle-left "></i>&nbsp; Kembali ke halaman Company</a>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div align="right"></div>
            </div>
        </div>

        @if (isset($company))
            <form class="form-horizontal" method="post" id="" enctype="multipart/form-data"
                action="{{ route('company.update', $company->id) }}">
                @method('PATCH')
            @else
                <form class="form-horizontal" method="post" id="" enctype="multipart/form-data"
                    action="{{ route('company.store') }}">
        @endif

        @csrf


        <div class="panel panel-default" style="margin-bottom: 10px">
            <div class="panel-heading">
                <strong>{{ isset($company) ? 'Edit' : 'Create' }} Company</strong>
            </div>
            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <div class="box-body" id="parent-form-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group header-group-0">
                                <label class="control-label col-sm-4">First Name<span class="text-danger"
                                        title="This field is required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ isset($company) ? $company->name : '' }}">
                                    <div class="text-danger"></div>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group header-group-0">
                                <label class="control-label col-sm-4">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="address"
                                        value="{{ isset($company) ? $company->address : '' }}">
                                    <div class="text-danger"></div>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group header-group-0">
                                <label class="control-label col-sm-4">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ isset($company) ? $company->email : '' }}">
                                        <div class="text-danger"></div>
                                        <p class="help-block"></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <div align="right">
                    <button type="submit" name="action" value="Simpan" class="btn btn-primary">Simpan</button>
                    @if (!isset($company))
                        <button type="submit" name="action" value="Simpan & Buat Lagi" class="btn btn-success">Simpan &
                            Buat Lagi</button>
                    @endif
                </div>
            </div>
        </div>

        </form>

    </section>
@endsection

@section('js')
@endsection
