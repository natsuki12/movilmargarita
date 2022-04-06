@extends('layouts.backend.app')

@section('title')
    {{ date('Y') . 'Expenses' }}
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/js/boton8.js') }}">
    <style type="text/css">
        .table-striped tbody tr:nth-of-type(odd) {
    background-color: #fff;
}
table.dataTable tbody tr {
    background-color: #fff;
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
                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active"> Gastos del {{  date('Y') }}</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ strtoupper(date('Y')) }} Lista de gastos
                                    <small class="text-danger pull-right">Total gastos : {{ (session()->has('currency') ? 1 : $currency->value) * $expenses->sum('amount') }} {{ session()->has('currency') ? '$' : 'Bs' }}</small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead style="background-color: #00517a; color:#fff; ">
                                    <tr>
                                        <th>Orden</th>
                                        <th>Motivo del Gasto</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody style="color:black;">
                                    @foreach($expenses as $key => $expense)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $expense->name }}</td>
                                            <td>{{ number_format((session()->has('currency') ? 1 : $currency->value) * $expense->amount, 2) }}</td>
                                            <td>{{ Carbon\Carbon::now()->$expense->date->toFormattedDateString() }}</td>
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
                "buttons": [
             {
            text: 'Imprimir',
            titleAttr: 'imprimir',
            action: function ( e, dt, node, config ) {
                onclick (window.location.href='C:\Users\Federico\Downloads')
            }

        },{
            text: 'Excel',
            titleAttr: 'Excel',
            action: function ( e, dt, node, config ) {
                onclick (window.location.href='http://www.datatables.net')
            }
            
        },{
            text: 'PDF',
            titleAttr: 'PDF',
            action: function ( e, dt, node, config ) {
                onclick (window.location.href='http://www.datatables.net')
            }
            
        }]
            });
        });
    </script>

<script type="text/javascript">

        function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'Moviltrend_Productos.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
    </script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
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
