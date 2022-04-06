@extends('layouts.backend.app')

@section('title', 'Moviltrend')

@push('css')
    <!-- DataTables -->


    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/chosen/chosen.ccs') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/js/boton8.js') }}">
    <style type="text/css">
        
    </style>
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Cargo de pedido</li>
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
                        <div class="card">
                            <form action="{{ route('admin.invoice.create') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Pedido
                                        <span>
                                            <button type="submit" class="btn btn-sm btn-info float-md-right ml-3">Cargar pedido</button>
                                            @if(auth()->user()->hasRole('admin')|| auth()->user()->hasRole('contador'))<a href="{{ route('admin.customer.create') }}" class="btn btn-sm btn-primary float-md-right">Crear Persona Autorizada</a>
                                            @endif
                                        </span>
                                    </h3>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Seleccionar persona autorizada</label>
                                        <select name="customer_id" class="chosen" style="width:350px;" tabindex="1"required>
                                            
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </form>

                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-info"></i>
                                    Lista de pedidos

                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($cart_products->count() < 1)
                                    <div class="alert alert-movis1">
                                        No tienes productos agregados
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped text-center mb-3">
                                        <thead>
                                        <tr>
                                            <th>Orden</th>
                                            <th>Nombre</th>
                                            <th width="17%">Cantidad</th>
                                            <th>Precio</th>
                                            <th>Sub total</th>
                                            <th>Actualizar</th>
                                            <th>Borrar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart_products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $product->name }}</td>

                                                <form action="{{ route('admin.cart.update', $product->rowId) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <td>
                                                        <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
                                                    </td>
                                                    <?php $price = (session()->has('currency') ? 1 : $currency->value) * $product->price ?>
                                                    <td>{{ number_format($price, 2) }}</td>
                                                    <td>{{ number_format($price * $product->qty, 2) }}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </form>

                                                <td>
                                                    <button class="btn btn-danger" type="button" onclick="deleteItem({{ $product->id }})">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('admin.cart.destroy', $product->rowId) }}" method="post"
                                                          style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                <div class="alert alert-info">
                                    <p>Cantidad : {{ Cart::count() }}</p>
                                    <p>Sub Total : {{ (session()->has('currency') ? 1 : $currency->value) * Cart::subtotal() }}
                                        {{ session()->has('currency') ? '$' : 'Bs' }}</p>
                                    Envio : {{ Cart::tax() }} {{ session()->has('currency') ? '$' : 'Bs' }}
                                </div>
                                <div class="alert alert-success">
                                    Total : {{ (session()->has('currency') ? 1 : $currency->value) * Cart::total() }}
                                    {{ session()->has('currency') ? '$' : 'Bs' }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cargo de Pedido</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Foto</th>
                                        <th>Precio</th>
                                        <th>Imei</th>
                                        <th>Agregar a pedido</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <form action="{{ route('admin.cart.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $product->selling_price }}">

                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>
                                                    <img width="40" height="40" class="img-fluid" src="{{ URL::asset('storage/product/'. $product->image) }}" alt="{{ $product->name }}">
                                                </td>
                                                <td>{{ number_format((session()->has('currency') ? 1 : $currency->value) * $product->selling_price, 2) }}</td>
                                                <td>{{ strtoupper($product->code) }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-sm btn-success px-2">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
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
    </div> <!-- Content Wrapper end -->

@endsection




@push('js')
    <script type="text/javascript">
        
        $('#example').dataTable( {
    "drawCallback": function( settings ) {
         $('ul.pagination').addClass("pagination-sm");
    }
});

    </script>
    <!-- DataTables -->
  
    <!-- SlimScroll -->
    <script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

    <!-- Sweet Alert Js -->
    <link rel="stylesheet" href="{{ asset('assets/backend/js/boton8.js') }}">

    <script src="{{ asset('assets/backend/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chosen/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        $("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  //set isopen to opposite so next time when use clicked select box
  //it wont trigger this event
  $(this).data("isopen", !open);
});
    </script>
    <script type="text/javascript">
$(document).ready(function(){
    $(".chosen").chosen({no_results_text:'No hay resultados para '});
});
</script>

  


    <script type="text/javascript">
        function deleteItem(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: '¿Estas Seguro?',
                text: "No se podra revertir despues de esto!",
                type: 'Alerta',
                showCancelButton: true,
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>



@endpush
