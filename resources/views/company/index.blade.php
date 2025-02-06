@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Company
            @if (Auth::user()->role == 'direktur')
            <a href="{{ route('company.create') }}" id="" class="btn btn-sm btn-success" title="Tambah Data"><i
                    class="fa fa-plus-circle"></i> Tambah Data</a>
            @endif
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Halaman Awal</a></li>
            <li class="active">Company</li>
        </ol>
    </section>

    <section id="content_section" class="content">
        <div class="box">
            <div style="padding-bottom: 0px" class="box-header">

            </div>
            <div class="box-body table-responsive-sm">
                <table id="dataTable" class="table table-hover table-striped table-bordered" style="margin-bottom: 0px">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script>
        $('#dataTable').DataTable({
            ajax: '{{ url('companies/data') }}',
            processing: true,
            serverSide: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    </script>
@endsection
