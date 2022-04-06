@extends('layouts.backend.app')

@section('title', 'Toma de asistencia')

@push('css')
<style type="text/css">
        .table-striped tbody tr:nth-of-type(odd) {
    background-color: #fff;

}
table.dataTable tbody tr {
    background-color: #fff;
}</style>
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Marcar asistencia</li>
                           
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Marcar asistencia</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.attendance.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <h2 class="text-center my-4 text-bold text-primary">Fecha : {{ Carbon\Carbon::now()->formatLocalized('%D') }}</h2>
                                    <div class="row">
                                        <table class="table table-striped table-bordered"> 
                                            <thead style="background-color: #00517a; color:#fff; ">
                                                <tr>
                                                    <th>Orden</th>
                                                    <th>Nombre</th>
                                                    <th>Foto</th>
                                                    <th>Asistencia</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <form action="{{ route('admin.attendance.store') }}" method="post">
                                                    @csrf
                                                    @foreach($employees as $key => $employee)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $employee->name }}</td>
                                                            <td>
                                                                <img width="40" height="40" class="img-fluid img-rounded" src="{{ URL::asset('storage/employee/'. $employee->photo) }}" alt="{{ $employee->name }}">
                                                            </td>
                                                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                                            <td>
                                                                <input type="radio" name="attendance[{{ $employee->id }}]" value="1"  /> Asistente
                                                                <input type="radio" name="attendance[{{ $employee->id }}]" value="0"   />Inasistente
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </form>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Guardar Asistencia</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@push('js')

@endpush