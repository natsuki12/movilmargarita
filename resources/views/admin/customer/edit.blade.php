@extends('layouts.backend.app')

@section('title', 'Update Customer')

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Editar persona autorizada</li>
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
                                <h3 class="card-title">Editar personas autorizada</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input type="email" class="form-control" name="email" value="{{ $customer->email }}"  placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <input type="text" class="form-control" name="address" value="{{ $customer->address }}" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" name="city" value="{{ $customer->city }}" placeholder="Enter City">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre de tienda</label>
                                                <input type="text" class="form-control" name="shop_name" value="{{ $customer->shop_name }}" placeholder="Enter Shop Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Cargar archivo</label>
                                                    </div>
                                                </div>
                                                <p class="mt-2">
                                                    <img width="50" height="50" src="{{ URL::asset("storage/customer/".$customer->photo) }}" alt="{{ $customer->name }}">
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de autorizacion</label>
                                                <input type="text" class="form-control" name="account_holder" value="{{ $customer->account_holder }}" placeholder="Enter Account Holder">
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de cuenta</label>
                                                <input type="text" class="form-control" name="account_number" value="{{ $customer->account_number }}" placeholder="Enter Account Number">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre del banco</label>
                                                <input type="text" class="form-control" name="bank_name" value="{{ $customer->bank_name }}" placeholder="Enter Bank Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Sucursal</label>
                                                <input type="text" class="form-control" name="bank_branch" value="{{ $customer->bank_branch }}" placeholder="Enter Bank Branch">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Actualizar Personas Permitidas Para Encargos</button>
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