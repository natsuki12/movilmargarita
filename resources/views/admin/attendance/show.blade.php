@extends('layouts.backend.app')

@section('title', 'View Attendance')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Lista de asistencias</li>
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
                                <h3 class="card-title">{{ strtoupper('Visualizar asistencia') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h2 class="text-center my-4 text-bold text-primary">Fecha : {{ Carbon\Carbon::now()->toFormattedDateString() }}<!--{{ date("l, d F Y", strtotime($date)) }}--></h2>
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead style="background-color: #00517a; color:#fff; ">
                                    <tr>
                                        <th>Orden</th>
                                        <th>Nombre</th>
                                        
                                        <th>Asistencia</th>
                                        <th>Fecha</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody style="color:black;">
                                        @foreach($attendances as $key => $attendance)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $attendance->employee->name }}</td>
                                                
                                                <td>
                                                    @if($attendance->attendance == '1')
                                                        <span class="badge badge-success">Presente</span>
                                                    @else
                                                        <span class="badge badge-danger">Inasistente</span>
                                                    @endif
                                                </td>
                                                <td>{{ Carbon\Carbon::now()->toFormattedDateString() }}</td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
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
                "apr":'abril',
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