@extends('layouts.backend.app')

@section('title', 'Update Employee')

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
                            <li class="breadcrumb-item active">Modificar empleado</li>
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
                                <h3 class="card-title">Modificar empleado</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="name" value="{{ $employee->name }}" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input type="email" class="form-control" name="email" value="{{ $employee->email }}"  placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <input type="text" class="form-control" name="address" value="{{ $employee->address }}" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" name="city" value="{{ $employee->city }}" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <input type="text" class="form-control" name="experience" value="{{ $employee->experience }}" placeholder="Enter Experience">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Elegir Foto</label>
                                                    </div>
                                                </div>
                                                <p class="mt-2">
                                                    <img width="50" height="50" src="{{ URL::asset("storage/employee/".$employee->photo) }}" alt="{{ $employee->name }}">
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Cedula</label>
                                                <input type="text" class="form-control" name="nid_no" value="{{ $employee->nid_no }}" placeholder="Enter NID No">
                                            </div>
                                            <div class="form-group">
                                                <label>Salario</label>
                                                <input type="text" class="form-control" name="salary" value="{{ $employee->salary }}" placeholder="Enter Salary">
                                            </div>
                                            <div class="form-group">
                                                <label>Nivel de Estudio</label>
                                                <select class="form-control" name="vacation" value="{{ $employee->vacation }}" placeholder="Enter Vacation">
                                                     <option></option>
               <option>Actuaci??n (Arte)</option>
               <option>Dise??o gr??fico (Arte)</option>
               <option>Educaci??n F??sica, Deporte y Recreaci??n (Carreras Tovar)</option>
               <option>Comunicaci??n Social</option>
               <option>Educaci??n Men. Ciencias de la Salud </option>
               <option>Educaci??n Men. Ciencias Sociales </option>
               <option>Farmacia</option>
               <option>Ingenier??a C??vil</option>
               <option>Ingenier??a de Producci??n en Agroecosistemas</option>
               <option>Ingenier??a de Sistemas</option>
               <option>Administraci??n </option>
               <option>Educaci??n menci??n Matem??tica</option>
               <option>Ingenier??a El??ctricaLara</option>
               <option>Educaci??n menci??n Lenguas Modernas </option>
               <option>Historia</option>
               <option>Ingenier??a Geol??gica </option>
               <option>Ingenier??a Qu??mica</option>
               <option>Profesionalizaci??n de Enfermer??a </option>
               <option>Profesionalizaci??n de TSU</option>
               <option>Tecnolog??a superior en Estad??stica de la Salud</option>
               <option>Nutrici??n y Diet??tica</option>
               <option>Medicina</option>
               <option>Letras menc. Lengua y Literat. Hispanoamer. y Vzlana</option>
               <option>Bachiller</option>
               <option>No posee</option>
          </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Actualizar Empleados</button>
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