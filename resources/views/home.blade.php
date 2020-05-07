@extends('layouts.app')
@section('content')
<script>
            $(function () {
                // #sidebar-toggle-button
                $('#sidebar-toggle-button').on('click', function () {
                        $('#sidebar').toggleClass('sidebar-toggle');
                        $('#page-content-wrapper').toggleClass('page-content-toggle');  
                        fireResize();                   
                });
                
                // sidebar collapse behavior
                $('#sidebar').on('show.bs.collapse', function () {
                    $('#sidebar').find('.collapse.in').collapse('hide');
                });
                
                // To make current link active
                var pageURL = $(location).attr('href');
                var URLSplits = pageURL.split('/');

                //console.log(pageURL + "; " + URLSplits.length);
                //$(".sub-menu .collapse .in").removeClass("in");

                if (URLSplits.length === 5) {
                    var routeURL = '/' + URLSplits[URLSplits.length - 2] + '/' + URLSplits[URLSplits.length - 1];
                    var activeNestedList = $('.sub-menu > li > a[href="' + routeURL + '"]').parent();

                    if (activeNestedList.length !== 0 && !activeNestedList.hasClass('active')) {
                        $('.sub-menu > li').removeClass('active');
                        activeNestedList.addClass('active');
                        activeNestedList.parent().addClass("in");
                    }
                }

                function fireResize() {
                    if (document.createEvent) { // W3C
                        var ev = document.createEvent('Event');
                        ev.initEvent('resize', true, true);
                        window.dispatchEvent(ev);
                    }
                    else { // IE
                        element = document.documentElement;
                        var event = document.createEventObject();
                        element.fireEvent("onresize", event);
                    }
                }
            })
        </script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-leaf"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">#<span class="count">0</span></div>
                                            <div class="stat-heading">Arboles</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-crop"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">1</span></div>
                                            <div class="stat-heading">Dispositivos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-cloud"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">25</span>%</div>
                                            <div class="stat-heading">Humedad Actual</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-eyedropper"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">28</span>°</div>
                                            <div class="stat-heading">Temperatura Actual</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Información</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Temperatura Suelo</h4>
                                            <!-- <div class="por-txt">3,220 Users (24%)</div> -->
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Humedad</h4>
                                            <!-- <div class="por-txt">29,658 Users (60%)</div> -->
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Temperatura</h4>
                                        <!--     <div class="por-txt">99,658 Users (90%)</div> -->
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Dispositivos</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>ID</th>
                                                    <th>Grupo</th>
                                                    <th>Tipo</th>
                                                    <th>Bateria</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td> #413E16 </td>
                                                    <td>  <span class="name">Devkit_413E16</span> </td>
                                                    <td> <span class="product">SigFox</span> </td>
                                                    <td><span class="count">89</span>%</td>
                                                    <td>
                                                        <span class="badge badge-complete">Activo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card br-0">
                                        <div class="card-body">
                                            <div class="chart-container ov-h">
                                                <div id="flotPie1" class="float-chart"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.card -->
                                </div>

                                <div class="col-lg-6 col-xl-12">
                                    <div class="card bg-flat-color-3  ">
                                        <div class="card-body">
                                            <h4 class="card-title m-0  white-color ">Mayo 2020</h4>
                                        </div>
                                         <div class="card-body">
                                             <div id="flotLine5" class="flot-line"></div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                        <div class="card">
                                                    <div class="card" style="width: 18rem;">
                          {{-- <img class="card-img-top" src="https://c.tadst.com/gfx/1200x630/calendar.png?1" alt="Card image cap"> --}}
                          <div class="card-body">
                            <h5 class="card-title">Busqueda Especifica</h5>
                            <form>
                          <div class="form-group">
                                <label for="start">Fecha:</label>
                                <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31">
                          </div>
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                          </div>
                        </div>
                        </div><!-- /.card -->
                        </div>

                        

{{-- <div id="curve_chart" style="width: 400 px; height: 150px"></div> --}}
                     <div class="col-md-9 col-lg-9">
                        <div class="card">
                            <div id="curve_chart" style="width: 400 px; height: 400px"></div>
                        </div><!-- /.card -->
                    </div>

                    </div>
                     <div class="row">
                        <div class="col-md-3 col-lg-3">
                        <div class="card">
                                                    <div class="card" style="width: 18rem;">
                          {{-- <img class="card-img-top" src="https://c.tadst.com/gfx/1200x630/calendar.png?1" alt="Card image cap"> --}}
                          <div class="card-body">
                            <h5 class="card-title">Busqueda Comparativa</h5>
                            <form>
                          <div class="form-group">
                                <label for="start">Fecha Inicio:</label>
                                <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31">
                          </div>
                          <div class="form-group">
                                <label for="start">Fecha Final:</label>
                                <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31">
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Humedad Suelo</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Humedad</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Temperatura Suelo</label>
                          </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Temperatura</label>
                          </div>
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                          </div>
                        </div>
                        </div><!-- /.card -->
                        </div>

                        

{{-- <div id="curve_chart" style="width: 400 px; height: 150px"></div> --}}
                     <div class="col-md-9 col-lg-9">
                        <div class="card">
                            <div id="barchart_values" style="width: 400px; height: 400px;"></div>
                        </div><!-- /.card -->
                    </div>

                    </div>
                </div>
                <!-- /.orders -->
                <!-- Calender Chart Weather  -->
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="box-title">Chandler</h4> -->
                                <div class="calender-cont widget-calender">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card ov-h">
                            <div class="card-body bg-flat-color-2">
                                <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                            </div>
                            <div id="cellPaiChart" class="float-chart"></div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card weather-box">
                            <h4 class="weather-title box-title">Temperatura</h4>
                            <div class="card-body">
                                <div class="weather-widget">
                                    <a class="weatherwidget-io" href="https://forecast7.com/en/40d71n74d01/new-york/" data-label_1="Temperatura" data-label_2="
                                    " data-theme="original" >NEW YORK WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
                <!-- /Calender Chart Weather -->
                <!-- Modal - Calendar - Add New Event -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->

        <!-- /.content -->

        <script type="text/javascript">
// boolean outputs "" if false, "1" if true
var bool = '<?php echo $data ?>'; 

// numeric value, both with and without quotes
console.log(bool);

</script>



 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Humedad', 'Humedad Suelo','Temperatura','Temperatura Suelo'],
          ['01/05/2020',  30,      29,            27,           30],
          ['30/05/2020',  35,      30,             29,          35],
          ['29/05/2020',  32,       32,            30,           35],
          ['28/05/2020',  29,      26,              27,            36]
        ]);

        var options = {
          title: 'Busqueda Especifica',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["05/05/2020", 29.5, "blue"],
        ["01/05/2020", 28.3, "silver"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Comparacion",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>




@endsection



