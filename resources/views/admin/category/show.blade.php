@extends('layouts.backend.app')

@section('title', 'Show Supplier')

@push('css')

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
                            <li class="breadcrumb-item active">Mostrar proveedores</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Proveedores</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <p>{{ $supplier->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <p>{{ $supplier->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <p>{{ $supplier->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <p>{{ $supplier->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Pais</label>
                                                <p>{{ $supplier->city }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Tienda</label>
                                                <p>{{ $supplier->shop_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <p>
                                                    @if($supplier->type == 1)
                                                        {{ 'Distributor' }}
                                                    @elseif($supplier->type == 2)
                                                        {{ 'Whole Seller' }}
                                                    @elseif($supplier->type == 3)
                                                        {{ 'Brochure' }}
                                                    @else
                                                        {{ 'None' }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <p>
                                                    <img width="50" height="50" src="{{ URL::asset("storage/supplier/".$supplier->photo) }}" alt="{{ $supplier->name }}">
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo de cuenta</label>
                                                <p>{{ $supplier->account_holder }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de cuenta</label>
                                                <p>{{ $supplier->account_number }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre del banco</label>
                                                <p>{{ $supplier->bank_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Succursal</label>
                                                <p>{{ $supplier->bank_branch }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

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