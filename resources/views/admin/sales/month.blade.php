@extends('layouts.backend.app')

@section('title')
    {{ date('F') . 'Expenses' }}
@endsection

@push('css')
    <!-- DataTables -->
    <style type="text/css">
        .table-striped tbody tr:nth-of-type(odd) {
    background-color: #fff;

}
table.dataTable tbody tr {
    background-color: #fff;
}
    </style>
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/js/boton8.js') }}">
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Panel</a></li>
                            <li class="breadcrumb-item active">{{ Carbon\Carbon::now()->formatLocalized('%B') }} Encargos</li>
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
                        <div class="mb-3">
                             <select name="dest"id="currency-value" type="text" class="form-control" name="currency">
                            <option value="{{ route('admin.sales.monthly', 'january') }}">Enero</option>
                            <option value="{{ route('admin.sales.monthly', 'february') }}">Febrero</option>
                            <option value="{{ route('admin.sales.monthly', 'march') }}">Marzo</option>
                            <option value="{{ route('admin.sales.monthly', 'april') }}">Abril</option>
                            <option value="{{ route('admin.sales.monthly', 'may') }}">Mayo</option>
                            <option value="{{ route('admin.sales.monthly', 'june') }}">Junio</option>
                            <option value="{{ route('admin.sales.monthly', 'july') }}">Julio</option>
                            <option value="{{ route('admin.sales.monthly', 'august') }}">Agosto</option>
                            <option value="{{ route('admin.sales.monthly', 'september') }}">Septiembre</option>
                            <option value="{{ route('admin.sales.monthly', 'october') }}">Octubre</option>
                            <option value="{{ route('admin.sales.monthly', 'november') }}">Noviembre</option>
                            <option value="{{ route('admin.sales.monthly', 'december') }}">Diciembre</option>
                            </select>
                            
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                     Encargos del mes
                                    
                                    <small class="text-danger pull-right">
                                        <span class="badge badge-info">Total Encargos : {{ (session()->has('currency') ? 1 : $currency->value) * $balance->sum('total') }} {{ session()->has('currency') ? '$' : 'Bs' }}</span>
                                        <span class="badge badge-success">Pagos : {{ (session()->has('currency') ? 1 : $currency->value) * $balance->sum('pay') }} {{ session()->has('currency') ? '$' : 'Bs' }}</span>
                                        <span class="badge badge-warning">Deudas : {{ (session()->has('currency') ? 1 : $currency->value) * $balance->sum('due') }} {{ session()->has('currency') ? '$' : 'Bs' }}</span>
                                    </small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead style="background-color: #00517a; color:#fff; ">
                                    <tr>
                                        <th>Orden</th>
                                        <th>Nombre Articulo</th>
                                        
                                        <th>Persona Autorizada</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody style="color:black">
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->product_name }}</td>
                                            
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ number_format((session()->has('currency') ? 1 : $currency->value) * $order->total, 2) }}</td>
                                            <td>{{ date('d-M-Y h:i:s A', strtotime($order->created_at)) }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem({{ $order->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <form id="delete-form-{{ $order->id }}" action="{{ route('admin.expense.destroy', $order->id) }}" method="post"
                                                      style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
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

    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

    <!-- Sweet Alert Js -->
    <script src="{{ asset('assets/backend/js/alerta.js') }}"></script>

     <script src="{{ asset('assets/backend/js/boton.js') }}"></script>
    <script src="{{ asset('assets/backend/js/boton2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/boton3.js') }}"></script>
    <script src="{{ asset('assets/backend/js/boton4.js') }}"></script>
    <script src="{{ asset('assets/backend/js/boton5.js') }}"></script>
    <script src="{{ asset('assets/backend/js/boton6.js') }}"></script>
    <script src="{{ asset('assets/backend/js/boton7.js') }}"></script>
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
        $(document).ready(function () {
           
            var table = $('#example1').DataTable({
                "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                "responsive": false,
                "language": {
                    "url": "{{ asset('assets/backend/js/español.js')}}"
                },
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "order": [
                    [0, "desc"]
                ],
                "pagingType": "numbers",
                "initComplete": function () {
                    this.api().columns().every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    })
                },
                "buttons": ['csv', 'excel', 'pdf', 'print']
            });
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
                title: 'Seguro Que Quieres Eliminar?',
                text: "No se Podra Repuperar Informacion Despues",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar!',
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
