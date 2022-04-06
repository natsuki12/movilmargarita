@extends('layouts.backend.app')

@section('title', 'Personas Permitidas Para Encargos')

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tablero</a></li>
                            <li class="breadcrumb-item active">Agregar persona autorizada</li>
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
                                <h3 class="card-title">Agregar persona autorizada</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.customer.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ingrese nomre y apellido">
                                            </div>
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ingrese correo electronico">
                                            </div>
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="ingrese numero de telefono">
                                            </div>
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="ingrese direccion">
                                            </div>
                                            <div class="form-group">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="ingrese ciudad de empresa">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}" placeholder="ingrese nombre de la tienda">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Cargar Archivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de autorizacion</label>
                                                <input type="text" class="form-control" name="account_holder" value="{{ old('account_holder') }}" placeholder="ingrese numero de autorizacion">
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de cuenta</label>
                                                <input type="text" class="form-control" name="account_number" value="{{ old('account_number') }}" placeholder="numero de cuenta">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre del banco</label>
                                                <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" placeholder="nombre del banco">
                                            </div>
                                            <div class="form-group">
                                                <label>Sucursal</label>
                                                <input type="text" class="form-control" name="bank_branch" value="{{ old('bank_branch') }}" placeholder="sucursal bancaria">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Añadir persona autorizada</button>
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