@extends('layouts.backend.app')

@section('title')
    {{ date('F') . 'Expenses' }}
@endsection

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
                            <li class="breadcrumb-item active">Gastos del mes </li>
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
                            <option value="{{ route('admin.expense.month', 'january') }}">Enero</option>
                            <option value="{{ route('admin.expense.month', 'february') }}">Febrero</option>
                            <option value="{{ route('admin.expense.month', 'march') }}">Marzo</option>
                            <option value="{{ route('admin.expense.month', 'april') }}">Abril</option>
                            <option value="{{ route('admin.expense.month', 'may') }}">Mayo</option>
                            <option value="{{ route('admin.expense.month', 'june') }}">Junio</option>
                            <option value="{{ route('admin.expense.month', 'july') }}">Julio</option>
                            <option value="{{ route('admin.expense.month', 'august') }}">Agosto</option>
                            <option value="{{ route('admin.expense.month', 'september') }}">Septiembre</option>
                            <option value="{{ route('admin.expense.month', 'october') }}">Octubre</option>
                            <option value="{{ route('admin.expense.month', 'november') }}">Noviembre</option>
                            <option value="{{ route('admin.expense.month', 'december') }}">Diciembre</option>
                            </select>
                            
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                     Lista de gastos del mes de {{ Carbon\Carbon::now()->formatLocalized('%B') }}
                                    <small class="text-danger pull-right">Total Gastos : {{(session()->has('currency') ? 1 : $currency->value) * $expenses->sum('amount') }} {{ session()->has('currency') ? '$' : 'Bs' }}</small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead style="background-color: #00517a; color:#fff; ">
                                    <tr>
                                        <th>Orden</th>
                                        <th>Motivo</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    
                                     <tbody style="color:black">
                                    @foreach($expenses as $key => $expense)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $expense->name }}</td>
                                            <td>{{ number_format((session()->has('currency') ? 1 : $currency->value) * $expense->amount, 2) }}</td>
                                            <td>{{ $expense->date->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.expense.edit', $expense->id) }}" class="btn
													btn-info">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <button class="btn btn-danger" type="button" onclick="deleteItem({{ $expense->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <form id="delete-form-{{ $expense->id }}" action="{{ route('admin.expense.destroy', $expense->id) }}" method="post"
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
function surfto(form)
{
var myindex=form.dest.selectedIndex
window.open(form.dest.options[myindex].value,"_top","&quotGiño;
}
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
