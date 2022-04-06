@extends('layouts.backend.app')

@section('title', 'Moviltrend')

@push('css')
 
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/js/jsCalendar.css') }}">

@endpush

@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Panel de Inicio</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">inicio</a></li>
							<li class="breadcrumb-item active">Panel</li>
                            <li class="breadcrumb-item"><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out"></i>Cerrar Sesion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content" >
			<div class="container-fluid">
                <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-md-6 ">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Productos en Tienda</span>
                                <span class="info-box-number mb-3">{{ $sales->sum('total') }} $</span>
                                <canvas id="myChart3" height="200px" width="400px"> </canvas>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    @if(auth()->user()->hasRole('contador')|| auth()->user()->hasRole('admin'))
                    <!-- /.col -->
                    
                    <!-- /.col -->
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total Pagado</span>
                                <span class="info-box-number mb-3">{{ $sales->sum('pay') }} $</span>
                                <canvas id="myChart2" height="200px" width="400px"> </canvas>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    </div>
                   
                       
                           
                    <div class="row">

                        <div class="col-md-6 col-sm-3 col-6">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-calculator"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total gastos</span>
                                <span class="info-box-number mb-3">{{ $expenses->sum('amount') }} $</span>

                                <canvas id="myChart" height="207px" width="503px"> </canvas>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                            <div class="auto-jsCalendar material-theme" data-language="es" data-day-format="DDD" width="30px" heigth="200px"></div>
                            
                            <!-- /.info-box-content -->
                        
                        <!-- /.info-box -->
                   
                    
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa fa-bell-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total Deudas</span>
                                <span class="info-box-number mb-3">{{ $sales->sum('due') }} $</span>
                                <canvas id="myChart1" height="210px" width="240px"> </canvas>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->

                    
                    <!-- /.col -->
                    
                </div>
                    
@endif

                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>                            
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

@endsection

@push('js')


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
    
        
    <script type="text/javascript" src="{{ asset('assets/backend/js/jsCalendar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/jsCalendaresp.js') }}"></script>
	<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Month', 'Sales {{ date('Y') }}'],
                @foreach($current_sales as $sale)
                    ["{{ date('M', mktime('0', 0, 0, $sale['months'], 10)) }}", {{ $sale['sums'] }}],
                @endforeach
			]);

            var options = {
                title: 'Monthly Sales Report',
                width: 700,
                legend: { position: 'none' },
                chart: { title: 'Monthly Sales Report {{ date('Y') }}',
                    subtitle: 'Monthly Sales Report' },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'bottom', label: 'Month'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, options);
		}
	</script>

	<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Month', 'Sales {{ date('Y') }}'],
                @foreach($current_expenses as $expense)
                    ["{{ date('M', mktime('0', 0, 0, $expense['months'], 10)) }}", {{ $expense['sums'] }}],
                @endforeach
            ]);

            var options = {
                title: 'Monthly Expenses Report',
                width: 700,
                legend: { position: 'none' },
                chart: { title: 'Monthly Expenses Report {{ date('Y') }}',
                    subtitle: 'Monthly Expenses Report' },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'bottom', label: 'Month'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material2'));
            chart.draw(data, options);
        }


	</script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script type="text/javascript">
           var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"line",
            data:{
                labels:['col1','col2','col3','col4','col5','col6','col7','col8'],
                datasets:[{
                        label:'Num datos',
                        data:[1,60.17,4,6],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)',
                            'rgb(229, 90, 69,0.5)',
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)',
                            'rgb(229, 90, 69,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>

    <script type="text/javascript">
           var ctx= document.getElementById("myChart1").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"pie",
            data:{
                labels:['col1','col2'],
                datasets:[{
                        label:'Num datos',
                        data:[0,60.17,0,0],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)',
                            'rgb(229, 90, 69,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>
    <script type="text/javascript">
           var ctx= document.getElementById("myChart2").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"line",
            data:{
                labels:['col1','col2'],
                datasets:[{
                        label:'Num datos',
                        data:[0,60.17,0,0],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)',
                            'rgb(229, 90, 69,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>
    <script type="text/javascript">
           var ctx= document.getElementById("myChart3").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"doughnut",
            data:{
                labels:['Gastos del Dia','Gastos del Mes'],
                datasets:[{
                        label:'Num datos',
                        data:[49,60.17,0,0],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)',
                            'rgb(229, 90, 69,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>





@endpush
