<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Factura - {{ config('app.name', 'Moviltrend Margarita') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="icon" href="{{ asset('assets/backend/img/policymaker.ico') }}" type="image/x-icon" />

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="{{ asset('assets/backend/img/logo.png') }}" width="100px">Moviltrend Margarita 
                                        <small class="float-right">Fecha: {{ Carbon\Carbon::now()->formatLocalized('%d de %B del %Y') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            De
                            <address>
                                <strong>Compañia: Moviltrend Margarita</strong><br>
                                {{ $company->address }}<br>
                                {{ $company->city }} - {{ $company->zip_code }}, {{ $company->country }}<br>
                                Telefono: (+58) {{ $company->mobile }} {{ $company->phone !== null ? ', +58'.$company->phone : ''  }}<br>
                                Correo: {{ $company->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Para
                            <address>
                                <strong>{{ $customer->name }}</strong><br>
                                {{ $customer->address }}<br>
                                {{ $customer->city }}<br>
                                Telefono: (+58) {{ $customer->phone }}<br>
                                Correo: {{ $customer->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Total:</b> {{ Cart::total() }}<br>
                            <b>Confirmacion de Trasferencia:</b> <span class="badge badge-warning">Pendiente</span><br>
                            <b>Cuenta:</b> {{ $customer->account_number }}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Costo Por unidad</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contents as $content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $content->name }}</td>
                                        <td>{{ $content->qty }}</td>
                                        <td>{{ number_format($content->price, 2) }}</td>
                                        <td>{{ $content->subtotal() }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-8"></div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Total:</th>
                                        <td class="text-right">{{ Cart::subtotal() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Envio</th>
                                        <td class="text-right">{{ Cart::tax() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td class="text-right">{{ Cart::subtotal() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- /.content -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/backend/js/adminlte.js') }}"></script>

<script>
    window.print();
</script>

</body>



</html>




