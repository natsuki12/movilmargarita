@extends('layouts.backend.app')

@section('title', 'Add Product')

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
                            <li class="breadcrumb-item active">Add Product</li>
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
                                <h3 class="card-title">Agregar producto</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre del producto</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre del producto">
                                            </div>
                                            <div class="form-group">
                                                <label>Categoria del producto</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" disabled selected>Seleccionar a Categoria</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre del proveedor</label>
                                                <select name="supplier_id" class="form-control">
                                                    <option value="" disabled selected>Seleccionar Proveedor</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Codigo de producto</label>
                                                <input type="text" class="form-control" name="code" value="{{ old('code') }}" placeholder="Enter Product Code">
                                            </div>
                                            <div class="form-group">
                                                <label>Almacen</label>
                                                <select name="garage" class="form-control">
                                                    <option value="" disabled selected>Seleccionar Almacen</option>
                                                    <option value="Deposito">Deposito</option>
                                                    <option value="piso">Piso</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Deposito Caja">Deposito Caja</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Deposito</label>
                                                <select name="route" class="form-control">
                                                    <option value="" disabled selected>Select a destino en tienda</option>
                                                    <option value="tienda">Tienda</option>
                                                    <option value="Stand">Stand</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Imagen del producto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Selecciona archivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de lanzamiento</label>
                                                <input type="date" class="form-control" name="buying_date" value="{{ old('buying_date') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de Lanzamiento global</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{ old('expire_date') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Precio de compra</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ old('buying_price') }}" placeholder="Enter Buying Price">
                                            </div>
                                            <div class="form-group">
                                                <label>Precio de venta</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}" placeholder="Enter Selling Price">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Agregar producto</button>
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
