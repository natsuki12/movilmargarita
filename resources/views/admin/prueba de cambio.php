@extends('layouts.backend.app')

@section('title', 'Encargo de mercancia')

@push('css')
    <style>
        .modal-lg {
            max-width: 50% !important;
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Encargo de mercancia</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Documentacion</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12">
            
        <div class="col-xs-1">
            <h6><a href=" "><img src="{{ asset('assets/backend/img/logo.png') }}" width="200px" height="200px" />  </a>
            </h6>
            
        </div>
        <div class="col-xs-5">
            <h5><a><img alt="" /> <p></p>
                <p>    MOVILTREND MARGARITA C.A.</p>
                <p>    {{ $company->address }}</p>
                <p>     {{ $company->city }} - {{ $company->zip_code }}</p>
                <p>    {{ $company->mobile }}</p> </a>
            </h5>
            
        </div>
        <div class="col-xs-8 text-right">
                            <div class="col-12">
                                    <h4>
                                        <small class="float-right">Fecha: {{ Carbon\Carbon::now()->formatLocalized('%d de %B del %Y') }}</small>
                                    </h4>
                                </div>
                    </div>
 
            <hr />


<pre></pre>
<table class="table table-bordered">
    <thead >
        <tr >
            <th style="text-align: center;">
                <h4>COBRAR A:</h4>
            </th>
            <th style="text-align: center;">
                <h4>ENVIAR A:</h4>
            </th>
            
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3" style="text-align: center;">
                <p>{{ $customer->name }}</p>
                <p>{{ $customer->email }}</p>
                <p> {{ $customer->address }}</p>
                <p>{{ $customer->city }}</p>
                <p>{{ $customer->phone }}</p>
            </td>

            <td rowspan="3" style="text-align: center;"> 
                <p>Compañia: Moviltrend Margarita C.A.</p>
                <p>Email: {{ $company->email }}</p>
                <p>{{ $company->address }}</p>
                <p> {{ $company->city }} - {{ $company->zip_code }}</p>
                <p>Telefono: (+58) {{ $company->mobile }}</p> </a>
            </td>
            
            
        </tr>
        
        
        
    </tbody>
</table>
<pre></pre>
<table class="table table-bordered">
    <thead >
        <tr >
            <th style="text-align: center;">
                <h4>Cantidad</h4>
            </th>
            <th style="text-align: center;">
                <h4>Concepto</h4>
            </th>
            <th style="text-align: center;">
                <h4>Precio unitario</h4>
            </th>
            <th style="text-align: center;">
                <h4>Total</h4>
            </th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
             @foreach($contents as $content)
            <td style="text-align: center;">{{ $content->qty }}</td>
            <td><a href="#"> {{ $content->name }} </a></td>
            <td class=" text-right ">{{ number_format((session()->has('currency') ? 1 : $currency->value) * $content->price, 2) }}</td>
            <td class=" text-right ">{{ number_format((session()->has('currency') ? 1 : $currency->value) * $content->subtotal()) }}</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="#"> &nbsp; </a></td>
            <td class="text-right">&nbsp;</td>
            <td class="text-right ">&nbsp;</td>
            
        </tr>
        <tr >
            <td colspan="3" style="text-align: right;">Total .</td>
            <td style="text-align: right;">{{ number_format((session()->has('currency') ? 1 : $currency->value) * $content->subtotal()) }} $</td>
            
            
        </tr>
       
        @endforeach
    </tbody>
</table>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{ route('admin.invoice.print', $customer->id) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right"><i class="fa fa-credit-card"></i>
                                        Enviar Pedido
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--payment modal -->
    <form action="{{ route('admin.invoice.final_invoice') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Pedido de Parte de {{ $customer->name }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-info float-right mb-3">Total Precio : {{ Cart::total() }}</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Metodo de Pago</label>
                                <select name="payment_status" class="form-control" required >
                                    <option value="" disabled selected>Seleciona Metodo de Pago</option>
                                    <option value="Zelle">Zelle</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Por Cobrar">Por Cobrar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Monto</label>
                                <input type="number" name="pay" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Hacer Pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--/.payment modal -->



@endsection



@push('js')

@endpush
