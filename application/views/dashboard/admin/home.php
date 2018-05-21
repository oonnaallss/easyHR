<?php
              $this->load->view('layouts/admin/header');
            ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Selamat datang di <?php echo $credit; ?> admin panel !</p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 col-lg-6">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0 m-b-30">Absen Kehadiran</h4>
                                    
                                    <?php if($absen == 0){
                                    ?>
                                    <p class="text-muted text-center">Tanggal <?php echo $tgl_sekarang; ?> Anda Belum Absen Kehadiran</p>

                                    <div class="widget-chart text-center">
                                        <button class="ladda-button btn btn-success" id="btn_masuk" data-style="contract">Masuk
                                                </button>
                                        <button class="ladda-button btn btn-danger hidden" id="btn_keluar" data-style="contract">Keluar
                                                </button>
                                    </div>
                                    <?php 
                                    } else {?>
                                    <div class="widget-chart text-center">
                                        <button class="ladda-button btn btn-success hidden" id="btn_masuk" data-style="contract">Masuk
                                                </button>
                                        <button class="ladda-button btn btn-danger" id="btn_keluar" data-style="contract">Keluar
                                                </button>
                                    </div>
                                    <?php } ?>
                                        <small>( Personal )</small>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $pegawai; ?></b></h3>
                                        <p class="text-muted">Permintaan Cuti</p>
                                        <small>( Semua Pegawai )</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $kehadiran; ?></b></h3>
                                        <p class="text-muted">Kehadiran Mei</p>
                                        <small>( Personal )</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row hidden">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">15</b></h3>
                                        <p class="text-muted">Sisa Cuti</p>
                                        <small>( Personal )</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 hidden    ">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">280</b></h3>
                                        <p class="text-muted">Total Masuk</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div id="external-events" class="m-t-20">
                                                            <br>
                                                            <p>Uraian Navigasi</p>
                                                            <div class="external-event bg-primary" data-class="bg-primary" style="position: relative;">
                                                                <i class="fa fa-move"></i>Sppd
                                                            </div>
                                                            <div class="external-event bg-pink" data-class="bg-pink" style="position: relative;">
                                                                <i class="fa fa-move"></i>Cuti
                                                            </div>
                                                            <div class="external-event bg-warning" data-class="bg-info" style="position: relative;">
                                                                <i class="fa fa-move"></i>Pelatihan
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->
                                    <div class="col-md-9">
                                        <div class="card-box">
                                            <div id="calendar"></div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>  <!-- end row -->

                                <!-- BEGIN MODAL -->
                                <div class="modal fade none-border" id="event-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Add Category -->
                                <div class="modal fade none-border" id="add-category">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form">
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
                                                                <option value="inverse">Inverse</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->
                            </div>
                            <!-- end col-12 -->
                        </div> <!-- end row -->
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2018. <p><?php echo $credit; ?></p>
                </footer>

            </div>

        </div>
        <!-- END wrapper -->
<div id="module-opt" class="fc-popover fc-more-popover hidden" style="z-index: 100; top: 255px; left: 886px;">
  <div class="fc-header fc-widget-header"style="background-color: #34d3eb !important;"> <span class="fc-close fc-icon fc-icon-x" onclick="hidetool()"></span>
    <span class="fc-title" style="color:#fff;font-size: 15px;font-weight: 600;">Add Options</span>
    <div class="fc-clear"></div>
  </div>
  <div class="fc-body fc-widget-content" style="background-color:#fff;overflow: auto; height: 130px;">
    <div class="fc-event-container"> 
        <a data-toggle="modal" style="background-color:#fb6d9d" data-target=".view-modal-data" data-record="0" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable">
            <div class="fc-content"> <span class="fc-title">Cuti</span></div>
        </a> 
        <a data-toggle="modal" style="background-color:orange" data-target=".view-modal-data" data-record="1" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable">
            <div class="fc-content"> <span class="fc-title">Pelatihan</span></div>
        </a>
        <a data-toggle="modal" data-target=".view-modal-data" data-record="1" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable">
            <div class="fc-content"> <span class="fc-title">Sppd</span></div>
        </a>
    </div>
  </div>
</div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url(); ?>assets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/ladda-buttons/js/spin.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/ladda-buttons/js/ladda.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <!--<script src="<?php echo base_url(); ?>assets/pages/jquery.fullcalendar.js"></script>-->
       
        <script type="text/javascript">
                function hidetool(){
                    $('#module-opt').addClass('hidden');
                }
                var defaultEvents =  [{
                    title: 'Hey!',
                    start: new Date($.now() + 158000000),
                    className: 'bg-purple'
                }, {
                    title: 'See John Deo',
                    start: new Date($.now()),
                    end: new Date($.now()),
                    className: 'bg-danger'
                }, {
                    title: 'Buy a Theme',
                    start: new Date($.now() + 338000000),
                    className: 'bg-primary'
                }];
                var coba = [];
                 <?php
                 $stringarray = "";

                 foreach($kalender->result_array() as $list){
                    ?>
                    coba.push({title:"<?php echo $list['nama']?>",className:"<?php echo $list['class']?>", start:new Date("<?php echo $list['startdate'] ?>"),end:new Date("<?php echo $list['enddate'] ?>")});
                    <?php
                 }

                 // Del last ,
                 $stringarray = substr($stringarray,0,-1);
                 ?>
                $('#calendar').fullCalendar({
                    slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                    minTime: '08:00:00',
                    maxTime: '19:00:00',  
                    defaultView: 'month',  
                    handleWindowResize: true,   
                    height: $(window).height() - 200,   
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: coba,
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    eventRender: function(eventObj, $el) {
                      $el.popover({
                        title: eventObj.title,
                        content: moment(eventObj.start).format('DD/MM/YYYY')+ ' - ' + moment(eventObj.enddate).format('DD/MM/YYYY'),
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                      });
                    },
                    dayClick: function(date, jsEvent, view) {
                        var event_date = date.format();
                        $('#exact_date').val(event_date);
                        var eventInfo = $("#module-opt");
                        var mousex = jsEvent.pageX + 20; //Get X coodrinates
                        var mousey = jsEvent.pageY + 20; //Get Y coordinates
                        var tipWidth = eventInfo.width(); //Find width of tooltip
                        var tipHeight = eventInfo.height(); //Find height of tooltip

                        //Distance of element from the right edge of viewport
                        var tipVisX = $(window).width() - (mousex + tipWidth);
                        //Distance of element from the bottom of viewport
                        var tipVisY = $(window).height() - (mousey + tipHeight);

                        if (tipVisX < 20) { //If tooltip exceeds the X coordinate of viewport
                            mousex = jsEvent.pageX - tipWidth - 20;
                        } if (tipVisY < 20) { //If tooltip exceeds the Y coordinate of viewport
                            mousey = jsEvent.pageY - tipHeight - 0;
                        }
                        //Absolute position the tooltip according to mouse position
                        eventInfo.css({ top: mousey, left: mousex });
                        eventInfo.removeClass('hidden'); //Show tool tip

                    },
                    drop: function(date) { $this.onDrop($(this), date); },
                    //select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
                    eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

                });
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

                // Bind normal buttons
                $('#btn_masuk').click(function(e){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    /*setTimeout(function() {
                        l.stop();
                        $('#btn_masuk').addClass('hidden');
                        $('#btn_keluar').removeClass('hidden');
                    }, 12000);*/
                    $.post("your-url",
                      function(response){
                        console.log(response);
                      }, "json")
                    .always(function() { l.stop(); });
                    return false;
                });
                $('#btn_keluar').click(function(e){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    setTimeout(function() {
                        l.stop();
                        $('#btn_keluar').addClass('hidden');
                        $('#btn_masuk').removeClass('hidden');
                    }, 12000);
                    /*$.post("your-url", 
                        { data : data },
                      function(response){
                        console.log(response);
                      }, "json")
                    .always(function() { l.stop(); });
                    return false;*/
                });

            });
        </script>




    </body>
</html>