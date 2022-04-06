@extends('layouts.backend.app')

@section('title', 'Moviltrend')

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
  <style type="text/css">
        .table-striped tbody tr:nth-of-type(odd) {
    background-color: #00517a;
}
table.dataTable tbody tr {
    background-color: #00517a;
}
    </style>
 
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
                           
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content" >
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-file-signature"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1" style="font-size:20px ">Total de encargos confirmados</span>
                                <span class="info-box-number mb-3" style="font-size: 30px">5</span>
                               
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4 ">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-file-invoice-dollar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1"style="font-size:20px">Valor de equipos en tienda</span>
                                <span class="info-box-number mb-3" style="font-size: 30px"> 1960$</span>
                                
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4 ">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-file-invoice"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text mt-3 pb-1" style="font-size:20px ">Numero de encargos pendientes</span>
                                <span class="info-box-number mb-3" style="font-size: 30px">3</span>
                               
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    @if(auth()->user()->hasRole('contador')|| auth()->user()->hasRole('admin'))
                    <!-- /.col -->

                    <div class="col-md-6 ">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-warehouse"></i></span>

                            <div id="precio5" class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total Encargos</span>
                                <span class="info-box-number mb-3"> 1960$  </span><select name="select" id="inputSelect2" class="form-control" required="required">
                    <option value="1">Bimestral</option>
                    <option value="2">Trimestral</option>
                    <option value="3">Semestral</option>
                    <option value="4">Anual</option>
                </select>
                              <div id="chart5"> <canvas id="myChart5" height="207px" width="503px"> </canvas></div>
                              <div id="chart6"> <canvas id="myChart6" height="207px" width="503px"> </canvas></div>
                              <div id="chart7"> <canvas id="myChart7" height="207px" width="503px"> </canvas></div>
                              <div id="chart8"> <canvas id="myChart8" height="207px" width="503px"> </canvas></div>

                                
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    
                    <!-- /.col -->
                    
                    <!-- /.col -->
                   
                    <div class="col-md-6 col-sm-3 col-6">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fa fa-calculator"></i></span>

                            <div id="precio1" class="info-box-content">
                                <span class="info-box-text mt-3 pb-1">Total gastos</span>
                                <span class="info-box-number mb-3">60,17$</span>
                                 <select name="select" id="inputSelect" class="form-control" required="required">
                    <option value="1">Bimestral</option>
                    <option value="2">Trimestral</option>
                    <option value="3">Semestral</option>
                    <option value="4">Anual</option>
                </select>

                      <div id="chart"><canvas id="myChart" height="207px" width="503px"> </canvas></div>
                     <div id="chart2"><canvas id="myChart2" height="207px" width="503px"> </canvas></div>
                     <div id="chart3"><canvas id="myChart3" height="207px" width="503px"> </canvas></div>
                     <div id="chart4"><canvas id="myChart4" height="207px" width="503px"> </canvas></div>
                            </div>
                            

                         
             </div>
         </div>

                        <!-- /.info-box -->
                    </div>
                    </div>
                   @endif
                       
                   
                
                    
                </div>
            

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
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/jquery/jquery.min.js') }}"></script>
   
    <script type="text/javascript">
        $(function() {

  $("#inputSelect").on('change', function() {

    var selectValue1 = $(this).val();
    switch (selectValue1) {

      case "1":
        $("#chart").show(1000);
        $("#chart2").hide();
        $("#chart3").hide();
        $("#chart4").hide();
        break;

      case "2":
        $("#chart").hide();
        $("#chart2").show(1000);
        $("#chart3").hide();
        $("#chart4").hide();
        break;

      case "3":
        $("#chart").hide();
        $("#chart2").hide();
        $("#chart3").show(1000);
        $("#chart4").hide();
        break;

        case "4":
        $("#chart").hide();
        $("#chart2").hide();
        $("#chart3").hide();
        $("#chart4").show(1000);
        break;




    }

  }).change();

});
    </script>

    <script type="text/javascript">
        $(function() {

  $("#inputSelect2").on('change', function() {

    var selectValue = $(this).val();
    switch (selectValue) {

      case "1":
        $("#chart5").show(1000);
        $("#chart6").hide();
        $("#chart7").hide();
        $("#chart8").hide();
        break;

      case "2":
        $("#chart5").hide();
        $("#chart6").show(1000);
        $("#chart7").hide();
        $("#chart8").hide();
        break;

      case "3":
        $("#chart5").hide();
        $("#chart6").hide();
        $("#chart7").show(1000);
        $("#chart8").hide();
        break;

        case "4":
        $("#chart5").hide();
        $("#chart6").hide();
        $("#chart7").hide();
        $("#chart8").show(1000);
        break;


    }

  }).change();

});
    </script>
 
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>




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
            type:"bar",
            data:{
                labels:['Ene-Feb','Mar-Abr','May-Jun','Jul-Ago','Sep-Oct','Nov-Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,60.17,0,0,0,0],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                             'rgb(221,232,234)',
                            'rgb(211,225,228)',
                        
                          
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
    <script type="text/javascript">
           var ctx= document.getElementById("myChart2").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene-Mar','Abr-Jun','Jul-Sep','Oct-Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,1960,0,0],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                          
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

     <script type="text/javascript">
           var ctx= document.getElementById("myChart3").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene-Jun','Jul-Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[60.17,0],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                          
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

    
    <script type="text/javascript">
           var ctx= document.getElementById("myChart4").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,0,0,1960],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)'
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
     <script type="text/javascript">
           var ctx= document.getElementById("myChart5").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene-Feb','Mar-Abr','May-Jun','Jul-Ago','Sep-Oct','Nov-Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,0,0,60.17,0,0],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                             'rgb(221,232,234)',
                            'rgb(211,225,228)',
                        
                          
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
    <script type="text/javascript">
           var ctx= document.getElementById("myChart6").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene-Mar','Abr-Jun','Jul-Sep','Oct-Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,0,0,60.17],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                          
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

     <script type="text/javascript">
           var ctx= document.getElementById("myChart7").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene-Jun','Jul-Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,0,0,60.17],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                          
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

    
    <script type="text/javascript">
           var ctx= document.getElementById("myChart8").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                datasets:[{
                        label:'Mostrar grafica',
                        data:[0,0,0,1960],
                        labelColor:['rgb(221,232,234)'],
                        backgroundColor:[
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)',
                            'rgb(221,232,234)',
                            'rgb(211,225,228)'
                        ]
                }]
            },
           options: { 
            legend: {
                labels: {
                    fontColor: "White",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>





@endpush
